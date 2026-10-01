@extends('admin.master')
@section('title')
    Add Student Result
@endsection
@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Add Student Result</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <a href="{{ route('student-results.index') }}" class="btn btn-secondary text-white">
                    <i class="fa fa-arrow-left"></i> Back to List
                </a>
            </div>
        </div>
    </div>

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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Student Result Information</h4>
                    <h6 class="card-subtitle mb-4">Enter authentic student academic result information.</h6>

                    <form action="{{ route('student-results.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Student ID <span class="text-danger">*</span></label>
                                <input type="text" name="student_id" class="form-control" placeholder="e.g. 2171461025" value="{{ old('student_id') }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Registration No</label>
                                <input type="text" name="registration_no" class="form-control" placeholder="e.g. UU17105789" value="{{ old('registration_no') }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Student Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="student_name" class="form-control" placeholder="e.g. MD. SAMIUL BASIR" value="{{ old('student_name') }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Date of Birth (DOB) <span class="text-danger">*</span></label>
                                <input type="date" name="dob" class="form-control" value="{{ old('dob') }}" required>
                                <small class="text-muted">Used by students/recruiters for verification authentication.</small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Department <span class="text-danger">*</span></label>
                                <input type="text" name="department" class="form-control" placeholder="e.g. Textile Engineering" value="{{ old('department') }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Degree Awarded <span class="text-danger">*</span></label>
                                <input type="text" name="degree_awarded" class="form-control" placeholder="e.g. B.Sc in Textile Engineering" value="{{ old('degree_awarded') }}" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">CGPA <span class="text-danger">*</span></label>
                                <input type="text" name="cgpa" class="form-control" placeholder="e.g. 3.57" value="{{ old('cgpa') }}" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Passing Year <span class="text-danger">*</span></label>
                                <input type="text" name="passing_year" class="form-control" placeholder="e.g. 2020" value="{{ old('passing_year') }}" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>Active (Verifiable)</option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <div class="col-md-12 mb-4">
                                <label class="form-label">Optional Certificate / Transcript Document (PDF or Image)</label>
                                <input type="file" name="certificate_file" class="form-control" accept=".pdf,.jpg,.jpeg,.png,.webp">
                                <small class="text-muted">Max file size: 5MB (PDF, JPG, PNG)</small>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('student-results.index') }}" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-info text-white">Save Student Result</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
