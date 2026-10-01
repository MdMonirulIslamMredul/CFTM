<?php

namespace App\Http\Controllers;

use App\Models\StudentResult;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class StudentResultController extends Controller
{
    public function index()
    {
        return view('admin.student_result.index', [
            'results' => StudentResult::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('admin.student_result.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id'       => 'required|string',
            'student_name'     => 'required|string',
            'dob'              => 'required|date',
            'department'       => 'required|string',
            'degree_awarded'   => 'required|string',
            'cgpa'             => 'required',
            'passing_year'     => 'required',
            'certificate_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp|max:5120',
        ]);

        StudentResult::newStudentResult($request);
        return redirect()->route('student-results.index')->with('message', 'Student result created successfully.');
    }

    public function edit(StudentResult $studentResult)
    {
        return view('admin.student_result.edit', [
            'result' => $studentResult,
        ]);
    }

    public function update(Request $request, StudentResult $studentResult)
    {
        $request->validate([
            'student_id'       => 'required|string',
            'student_name'     => 'required|string',
            'dob'              => 'required|date',
            'department'       => 'required|string',
            'degree_awarded'   => 'required|string',
            'cgpa'             => 'required',
            'passing_year'     => 'required',
            'certificate_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp|max:5120',
        ]);

        StudentResult::updateStudentResult($request, $studentResult);
        return redirect()->route('student-results.index')->with('info', 'Student result updated successfully.');
    }

    public function destroy(StudentResult $studentResult)
    {
        StudentResult::deleteStudentResult($studentResult);
        return back()->with('error', 'Student result deleted successfully.');
    }

    public function importCsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt|max:10240',
        ]);

        $file = $request->file('csv_file');
        $handle = fopen($file->getRealPath(), 'r');

        if (!$handle) {
            return back()->with('error', 'Unable to read the uploaded CSV file.');
        }

        $header = fgetcsv($handle);
        if (!$header) {
            fclose($handle);
            return back()->with('error', 'CSV file is empty.');
        }

        // Clean headers: lowercase and remove BOM / whitespace
        $cleanedHeaders = array_map(function ($h) {
            return strtolower(trim(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $h)));
        }, $header);

        $imported = 0;
        $errors = [];
        $rowNum = 1;

        DB::beginTransaction();
        try {
            while (($row = fgetcsv($handle)) !== false) {
                $rowNum++;
                // Skip empty lines
                if (empty(array_filter($row, fn($val) => trim($val) !== ''))) {
                    continue;
                }

                $data = [];
                foreach ($cleanedHeaders as $index => $colName) {
                    $data[$colName] = isset($row[$index]) ? trim($row[$index]) : null;
                }

                // Required fields check
                $studentId    = $data['student_id'] ?? null;
                $studentName  = $data['student_name'] ?? null;
                $dobRaw       = $data['dob'] ?? null;
                $department   = $data['department'] ?? null;
                $degreeAwarded= $data['degree_awarded'] ?? null;
                $cgpa         = $data['cgpa'] ?? null;
                $passingYear  = $data['passing_year'] ?? null;

                if (!$studentId || !$studentName || !$dobRaw) {
                    $errors[] = "Row {$rowNum}: Missing Student ID, Student Name, or DOB.";
                    continue;
                }

                try {
                    $dob = Carbon::parse($dobRaw)->format('Y-m-d');
                } catch (\Exception $e) {
                    $errors[] = "Row {$rowNum}: Invalid DOB format '{$dobRaw}'. Use YYYY-MM-DD.";
                    continue;
                }

                $regNo  = $data['registration_no'] ?? null;
                $status = isset($data['status']) && $data['status'] !== '' ? (int)$data['status'] : 1;

                StudentResult::updateOrCreate(
                    ['student_id' => $studentId],
                    [
                        'registration_no' => $regNo,
                        'student_name'    => $studentName,
                        'dob'             => $dob,
                        'department'      => $department,
                        'degree_awarded'  => $degreeAwarded,
                        'cgpa'            => $cgpa,
                        'passing_year'    => $passingYear,
                        'status'          => $status,
                    ]
                );

                $imported++;
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            fclose($handle);
            return back()->with('error', 'Error during import: ' . $e->getMessage());
        }

        fclose($handle);

        $msg = "Successfully processed {$imported} student result(s).";
        if (!empty($errors)) {
            $msg .= ' Some warnings: ' . implode(' ', array_slice($errors, 0, 3));
        }

        return redirect()->route('student-results.index')->with('message', $msg);
    }

    public function downloadSampleCsv(): StreamedResponse
    {
        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="sample_student_results.csv"',
        ];

        return response()->stream(function () {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, [
                'student_id',
                'registration_no',
                'student_name',
                'dob',
                'department',
                'degree_awarded',
                'cgpa',
                'passing_year',
                'status',
            ]);

            fputcsv($handle, [
                '2171461025',
                'UU17105789',
                'MD.SAMIUL BASIR',
                '1998-05-15',
                'Textile Engineering',
                'B.Sc in Textile Engineering',
                '3.57',
                '2020',
                '1',
            ]);

            fputcsv($handle, [
                '2171461026',
                'UU17105790',
                'RAKIBUL HASAN',
                '1999-08-20',
                'Computer Science & Engineering',
                'B.Sc in CSE',
                '3.85',
                '2021',
                '1',
            ]);

            fclose($handle);
        }, 200, $headers);
    }
}
