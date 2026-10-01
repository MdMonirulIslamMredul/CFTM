@extends('frontend.master')
@section('title')
    Packages
@endsection
@section('content')
    <style>
        /* Custom CSS for form styling */
        /* Adjust margins and padding */
        .container {
            padding: 20px 0;
        }

       

        .iframe-container {
            position: relative;
            display: inline-block;
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.5; /* Adjust opacity as needed */
            pointer-events: none; /* Ensure clicks go through watermark to iframe */
        }

        /* Adjust margins and padding for small devices */
        @media(max-width: 576px) {
            .container {
                padding: 10px 0;
            }

            .col-md-4 {
                margin-bottom: 10px;
            }
        }
    </style>

    <!-- Content Wrapper Start -->
    <div class="content-wrapper">

        <!-- Breadcrumbs Start -->
        <!-- Remove or adjust as needed -->
        {{-- <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src="{{ asset('/') }}frontend/assets/images/breadcrumbs/6.jpg" alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color padding">
            <h1 class="page-title">Career Section</h1>
            <ul>
                <li>
                    <a class="active" href="index.html">Home</a>
                </li>
                <li>Career</li>
            </ul>
        </div>
    </div> --}}
        <!-- Breadcrumbs End -->

        <div class="container py-4">
            <h3>Result Check</h3>
            <form class="mt-4" action="{{ route('result_search') }}" method="POST">
                @csrf <!-- Add this line to include CSRF token -->
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <select class="form-control" name="session_id">
                            <option disabled selected>Select Session</option>
                            @foreach ($sessions as $session)
                                <option value="{{ $session->id }}"
                                    {{ isset($result) && $session->id == $result->session_id ? 'selected' : '' }}>
                                    {{ $session->session }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <input type="text" name="student_id" class="form-control" placeholder="Student Id"
                            value="{{ isset($result) ? $result->student_id : '' }}">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary btn-block">Search</button>
                    </div>
                </div>
            </form>

            <!-- Display search results -->
            @if (isset($result))
                <p class="text-success">Results found.</p>
                <h4 class="mt-4">Search Results:</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <div>
                                Student {{ $result->student_id }}
                            </div>
                            <div>
                                @if (Str::endsWith($result->file, ['.pdf', '.doc', '.docx']))
                                    <iframe class="w-100"
                                        src="{{ asset($result->file) }}" width="900" height="700">
                                    </iframe>
                                    <img class="watermark" src="{{ asset('/logo/logo-528423963.png') }}" alt="Watermark">
                                    {{-- <a href="{{ asset($result->file) }}" target="_blank">Download</a> --}}
                                @else
                                    
                                        <img class="w-100" src="{{ asset($result->file) }}" height="500"></img>
                                        <img class="watermark" src="{{ asset('/logo/logo-528423963.png') }}" alt="Watermark" style="height: 250px">
                                        {{-- <a href="{{ asset($result->file) }}" target="_blank">Download</a> --}}
                                    
                                @endif
                                <!-- Add other fields as needed -->
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <p class="text-danger">No results found.</p>
            @endif
        </div>
    </div>
    <!-- Content wrapper end -->
@endsection
