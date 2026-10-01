@extends('frontend.master')
@section('title')
    Appointment
@endsection
@section('content')
<style>
  /* Custom styles for accordion */
.accordion .card-header {
    background-color: #007bff; /* Change to your desired background color */
    border-radius: 0; /* Optional: Adjust border-radius as needed */
}

.accordion .card-header button {
    color: #fff; /* Change to your desired text color */
    width: 100%; /* Make the button full width */
    text-align: left; /* Align button text to the left */
}

.accordion .card-header button.collapsed {
    color: #fff; /* Change to your desired text color */
}

.accordion .card-body {
    background-color: #f8f9fa; /* Change to your desired background color */
    border: 1px solid #dee2e6; /* Optional: Adjust border styles as needed */
    border-top: 0; /* Optional: Remove top border */
    border-radius: 0; /* Optional: Adjust border-radius as needed */
}
.btn-custom {
    font-size: 28px; /* Adjust the font size as needed */
    text-decoration: none !important;
}



.btn-custom:hover {
    text-decoration: none; /* Remove the underline on hover */
}


</style>
<!-- Blog Section Start -->
<div class="rs-inner-blog orange-color pt-100 pb-100 md-pt-70 md-pb-70">
    <div class="container">
        <div class="blog-deatails">
            <div class="bs-img">
                <a href="#"><img src="assets/images/blog/inner/1.jpg" alt=""></a>
            </div>
            <div class="blog-full">
                <h2 class="title mb-20">{{ $info->title }}</h2>
                <div class="blog-desc mb-35">
                    <p>{!! $info->details1 !!}</p>
                </div>
                <div class="blog-desc mb-40 align-content-center justify-content-center">
                    <p>{!! $info->details2 !!}</p>
                </div>
                <div class="blog-desc">
                    <p>{!! $info->details3 !!}</p>
                </div>
            </div>
            <h3>Admission Requirements</h3>
           <!-- Add this debug section before the accordion loop -->
@if ($admission_requires->isEmpty())
<p>No admission requirements found.</p>
@else
<div id="accordion" class="accordion">
    @foreach ($admission_requires as $index => $data)
        <div class="card">
            <div class="card-header" id="heading{{ $index }}">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed btn-custom" data-toggle="collapse"
                            data-target="#collapse{{ $index }}" aria-expanded="false"
                            aria-controls="collapse{{ $index }}">
                        {{ $data->category->name }}
                        <i class="fa fa-plus float-right"></i>
                    </button>
                </h5>
            </div>

            <div id="collapse{{ $index }}" class="collapse" aria-labelledby="heading{{ $index }}"
                 data-parent="#accordion">
                <div class="card-body">
                    <h5 class="card-title">{{ $data->title }}</h5>
                    {!! $data->details !!}
                </div>
            </div>
        </div>
    @endforeach
</div>
@endif


        </div>

    </div>
</div>
<!-- Blog Section End -->
@endsection
