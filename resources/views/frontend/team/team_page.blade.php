@extends('frontend.master')
@section('title')
    Doctors
@endsection
@section('content')


<!-- Team Section Start -->
<div id="rs-team" class="rs-team style1 inner-style orange-color pt-94 pb-100 md-pt-64 md-pb-70 gray-bg">
    <div class="container">
        <div class="sec-title mb-50 md-mb-30 text-center">
            <div class="sub-title orange">Instructor</div>
            <h2 class="title mb-0">Expert Teachers</h2>
        </div>
        <div class="row">
            @foreach ($teams as $team)
            <div class="col-lg-4 col-sm-6 mb-30">
                <div class="team-item">
                    <img src="{{ asset($team->image) }}" alt="" style="height: 300px">
                    <div class="content-part">
                        <h4 class="name"><a href="team-single.html">{{ $team->name }}</a></h4>
                        <span class="designation">{{ $team->designation }}</span>
                        <ul class="social-links">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
            
           
        </div>
    </div>
</div>
<!-- Team Section End -->
@endsection
