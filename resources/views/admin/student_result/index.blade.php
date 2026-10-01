@extends('admin.master')
@section('title')
    Student Results Archive
@endsection
@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Student Results Verification & Archive</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <a href="{{ route('student-results.create') }}" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                    <i class="fa fa-plus-circle"></i> Add New Result
                </a>
                <button type="button" class="btn btn-success d-none d-lg-block m-l-15 text-white" data-bs-toggle="modal" data-bs-target="#bulkImportModal">
                    <i class="fa fa-upload"></i> Bulk CSV Import
                </button>
                <a href="{{ route('student-results.download-sample-csv') }}" class="btn btn-secondary d-none d-lg-block m-l-15 text-white">
                    <i class="fa fa-download"></i> Sample CSV
                </a>
            </div>
        </div>
    </div>

    <!-- Alert / Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Student Results</h4>
                    <h6 class="card-subtitle">Manage student results records for authentication & verification.</h6>
                    <div class="table-responsive m-t-20">
                        <table id="config-table" class="table display table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student ID</th>
                                    <th>Reg. No</th>
                                    <th>Student Name</th>
                                    <th>DOB</th>
                                    <th>Department</th>
                                    <th>Degree Awarded</th>
                                    <th>CGPA</th>
                                    <th>Year</th>
                                    <th>Certificate</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($results as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><strong>{{ $item->student_id }}</strong></td>
                                        <td>{{ $item->registration_no ?? 'N/A' }}</td>
                                        <td>{{ $item->student_name }}</td>
                                        <td>{{ $item->dob ? $item->dob->format('d M, Y') : 'N/A' }}</td>
                                        <td>{{ $item->department }}</td>
                                        <td>{{ $item->degree_awarded }}</td>
                                        <td><span class="badge bg-primary fs-6">{{ $item->cgpa }}</span></td>
                                        <td>{{ $item->passing_year }}</td>
                                        <td>
                                            @if ($item->certificate_file)
                                                <a href="{{ asset($item->certificate_file) }}" target="_blank" class="btn btn-sm btn-outline-info">
                                                    <i class="fa fa-file"></i> View
                                                </a>
                                            @else
                                                <span class="text-muted">None</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->status == 1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('student-results.edit', $item->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('student-results.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this result record?');" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bulk Import Modal -->
    <div class="modal fade" id="bulkImportModal" tabindex="-1" aria-labelledby="bulkImportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('student-results.import-csv') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="bulkImportModalLabel">Bulk Import Student Results (CSV)</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-muted small mb-3">
                            Upload a standard <code>.csv</code> file containing student results. 
                            If a Student ID already exists, its record will be automatically updated.
                        </p>
                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Select CSV File <span class="text-danger">*</span></label>
                            <input type="file" name="csv_file" class="form-control" accept=".csv,text/csv" required>
                        </div>
                        <div class="alert alert-info py-2 small mb-0">
                            <strong>CSV Columns required:</strong><br>
                            <code>student_id, registration_no, student_name, dob, department, degree_awarded, cgpa, passing_year, status</code>
                            <div class="mt-2">
                                <a href="{{ route('student-results.download-sample-csv') }}" class="btn btn-xs btn-outline-primary">
                                    <i class="fa fa-download"></i> Download CSV Template
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Upload & Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
