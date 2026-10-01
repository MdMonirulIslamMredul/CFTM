@extends('frontend.master')
@section('title')
    Result Archive | Verification
@endsection
@section('content')
<style>
    .result-archive-section {
        padding: 50px 0 80px 0;
        background-color: #f7f9fc;
        min-height: 70vh;
    }
    .archive-header-title {
        font-size: 28px;
        font-weight: 700;
        color: #2b3954;
        text-align: center;
        margin-bottom: 30px;
    }
    .search-box-card {
        background: #ffffff;
        border: 1px solid #d9e2ec;
        border-radius: 6px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        margin-bottom: 35px;
        overflow: hidden;
    }
    .search-box-header {
        background: #eef2f7;
        padding: 12px 20px;
        border-bottom: 1px solid #d9e2ec;
        font-weight: 600;
        color: #20407d;
        font-size: 15px;
    }
    .search-box-body {
        padding: 24px 20px;
    }
    .search-box-card .form-control {
        height: 48px;
        border: 1px solid #c4d1db;
        border-radius: 4px;
        padding: 10px 15px;
        font-size: 15px;
        color: #334e68;
    }
    .search-box-card .form-control:focus {
        border-color: #2060c8;
        box-shadow: 0 0 0 0.2rem rgba(32, 96, 200, 0.15);
    }
    .btn-search-archive {
        background-color: #1752b5;
        border-color: #1752b5;
        color: #ffffff;
        font-weight: 600;
        font-size: 16px;
        height: 48px;
        padding: 0 30px;
        border-radius: 4px;
        transition: all 0.3s ease;
    }
    .btn-search-archive:hover {
        background-color: #0f3d8a;
        border-color: #0f3d8a;
        color: #ffffff;
    }
    .result-info-card {
        background: #ffffff;
        border: 1px solid #d9e2ec;
        border-radius: 6px;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.06);
        overflow: hidden;
    }
    .result-info-header {
        background: #eef2f7;
        padding: 14px 22px;
        border-bottom: 1px solid #d9e2ec;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }
    .result-info-header h5 {
        margin: 0;
        font-size: 17px;
        font-weight: 700;
        color: #20407d;
    }
    .verified-badge {
        background-color: #d1fae5;
        color: #065f46;
        border: 1px solid #a7f3d0;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    .result-table {
        margin-bottom: 0;
        border-collapse: collapse;
        width: 100%;
    }
    .result-table th, .result-table td {
        padding: 14px 22px;
        border-bottom: 1px solid #eef2f7;
        font-size: 15px;
    }
    .result-table th {
        width: 32%;
        font-weight: 600;
        color: #20407d;
        background-color: #ffffff;
    }
    .result-table td {
        color: #102a43;
        font-weight: 500;
    }
    .result-table tr:last-child th, .result-table tr:last-child td {
        border-bottom: none;
    }
    .result-table tr:hover th, .result-table tr:hover td {
        background-color: #fafbfc;
    }
    .btn-print-slip {
        background-color: #334e68;
        color: #ffffff;
        border: none;
        padding: 8px 18px;
        border-radius: 4px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: background 0.2s ease;
    }
    .btn-print-slip:hover {
        background-color: #102a43;
        color: #ffffff;
    }

    /* Print-specific layout */
    @media print {
        body * {
            visibility: hidden;
        }
        #printable-result-card, #printable-result-card * {
            visibility: visible;
        }
        #printable-result-card {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            border: 2px solid #20407d !important;
            box-shadow: none !important;
            padding: 20px;
        }
        .no-print {
            display: none !important;
        }
    }
</style>

<div class="result-archive-section">
    <div class="container">
        <!-- Title matching image -->
        <h2 class="archive-header-title">Result Archive</h2>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Search Form Box -->
                <div class="search-box-card">
                    <div class="search-box-header">
                        <span>Student ID / Registration No <span class="text-danger">*</span></span>
                    </div>
                    <div class="search-box-body">
                        <form action="{{ route('result.verify') }}" method="POST">
                            @csrf
                            <div class="row align-items-end g-3">
                                <div class="col-md-5 mb-3 mb-md-0">
                                    <label class="form-label small text-muted font-weight-bold d-block">Student ID or Reg. No</label>
                                    <input 
                                        type="text" 
                                        name="identifier" 
                                        class="form-control" 
                                        placeholder="Enter Student ID or Registration No"
                                        value="{{ request('identifier', $searchedIdentifier ?? '') }}"
                                        required
                                        autofocus
                                    >
                                </div>
                                <div class="col-md-4 mb-3 mb-md-0">
                                    <label class="form-label small text-muted font-weight-bold d-block">Date of Birth (DOB) <span class="text-danger">*</span></label>
                                    <input 
                                        type="date" 
                                        name="dob" 
                                        class="form-control" 
                                        value="{{ request('dob', $searchedDob ?? '') }}"
                                        required
                                    >
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-search-archive w-100">
                                        <i class="fa fa-search"></i> Search
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Display Errors / Not Found Message -->
                @if (session('error'))
                    <div class="alert alert-danger shadow-sm border-0 py-3 mb-4">
                        <i class="fa fa-exclamation-circle me-2"></i> {{ session('error') }}
                    </div>
                @endif

                @if (isset($notFound) && $notFound)
                    <div class="alert alert-warning shadow-sm border-0 py-3 mb-4 text-center">
                        <i class="fa fa-info-circle me-2"></i> No authentic student result found matching the provided <strong>Student ID / Registration No</strong> and <strong>Date of Birth</strong>. Please check your credentials and try again.
                    </div>
                @endif

                <!-- Display Result Found -->
                @if (isset($result) && $result)
                    <div id="printable-result-card" class="result-info-card">
                        <div class="result-info-header">
                            <div>
                                <h5>Student Information</h5>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <span class="verified-badge">
                                    <i class="fa fa-check-circle"></i> Authenticated Result
                                </span>
                                <button type="button" class="btn-print-slip no-print" onclick="window.print()">
                                    <i class="fa fa-print"></i> Print Slip
                                </button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table result-table">
                                <tbody>
                                    <tr>
                                        <th>Student ID</th>
                                        <td>{{ $result->student_id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Registration No</th>
                                        <td>{{ $result->registration_no ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Student Name</th>
                                        <td class="font-weight-bold text-uppercase">{{ $result->student_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Department</th>
                                        <td>{{ $result->department }}</td>
                                    </tr>
                                    <tr>
                                        <th>Degree Awarded</th>
                                        <td>{{ $result->degree_awarded }}</td>
                                    </tr>
                                    <tr>
                                        <th>CGPA</th>
                                        <td><strong>{{ $result->cgpa }}</strong></td>
                                    </tr>
                                    <tr>
                                        <th>Passing Year</th>
                                        <td>{{ $result->passing_year }}</td>
                                    </tr>
                                    @if ($result->certificate_file)
                                    <tr class="no-print">
                                        <th>Certificate Document</th>
                                        <td>
                                            <a href="{{ asset($result->certificate_file) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                <i class="fa fa-external-link"></i> View / Download Official Marksheet
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <!-- Verification Footer for Print -->
                        <div class="p-3 text-center border-top bg-light small text-muted">
                            Verified on {{ date('d M, Y') }} via {{ config('app.name', 'CFTM') }} Official Result Archive.
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
