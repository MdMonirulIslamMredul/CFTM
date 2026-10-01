<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentResult extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'dob' => 'date',
    ];

    private static $studentResult, $fileUrl;

    public static function newStudentResult($request)
    {
        self::$fileUrl = $request->file('certificate_file') ? fileUpload($request->file('certificate_file'), 'upload/student-certificates/') : null;

        self::$studentResult = new StudentResult();
        self::saveBasicInfo(self::$studentResult, $request, self::$fileUrl);
        return self::$studentResult;
    }

    public static function updateStudentResult($request, $studentResult)
    {
        if ($request->file('certificate_file')) {
            if ($studentResult->certificate_file && file_exists(public_path($studentResult->certificate_file))) {
                @unlink(public_path($studentResult->certificate_file));
            } elseif ($studentResult->certificate_file && file_exists($studentResult->certificate_file)) {
                @unlink($studentResult->certificate_file);
            }
            self::$fileUrl = fileUpload($request->file('certificate_file'), 'upload/student-certificates/');
        } else {
            self::$fileUrl = $studentResult->certificate_file;
        }

        self::saveBasicInfo($studentResult, $request, self::$fileUrl);
        return $studentResult;
    }

    private static function saveBasicInfo($studentResult, $request, $fileUrl)
    {
        $studentResult->student_id       = trim($request->student_id);
        $studentResult->registration_no  = $request->registration_no ? trim($request->registration_no) : null;
        $studentResult->student_name     = trim($request->student_name);
        $studentResult->dob              = $request->dob;
        $studentResult->department       = trim($request->department);
        $studentResult->degree_awarded   = trim($request->degree_awarded);
        $studentResult->cgpa             = trim($request->cgpa);
        $studentResult->passing_year     = trim($request->passing_year);
        $studentResult->certificate_file = $fileUrl;
        $studentResult->status           = $request->status !== null ? $request->status : 1;
        $studentResult->save();
    }

    public static function deleteStudentResult($studentResult)
    {
        if ($studentResult->certificate_file && file_exists(public_path($studentResult->certificate_file))) {
            @unlink(public_path($studentResult->certificate_file));
        } elseif ($studentResult->certificate_file && file_exists($studentResult->certificate_file)) {
            @unlink($studentResult->certificate_file);
        }
        $studentResult->delete();
    }
}
