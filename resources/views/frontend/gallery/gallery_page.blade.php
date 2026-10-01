@extends('frontend.master')
@section('title')
    About
@endsection
@section('content')

<div class="content-wrapper">
     <!-- Breadcrumbs Start -->
     <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src="{{ asset('/') }}frontend/assets/images/breadcrumbs/4.jpg" alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h1 class="page-title">Gallery</h1>
            <ul>
                <li>
                    <a class="active" href="index.html">Educavo</a>
                </li>
                <li>Gallery</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->            

      
<!-- Breadcrumb Start -->
{{-- <div class="breadcrumb-wrap bg-f" style="background-image: url({{asset($banner->image)}});">
    <div class="container">
        <div class="breadcrumb-title">
            <h2>Gallery</h2>
            <ul class="breadcrumb-menu list-style">
                <li><a href="{{route('front.page')}}">Home</a></li>
                <li>Gallery</li>
            </ul>
        </div>
    </div>
</div> --}}
<!-- Breadcrumb End -->
<!-- Events Section Start -->
<div class="rs-gallery pt-100 pb-100 md-pt-70 md-pb-70">
    <div class="container">
        <h3>dgdgdfgdf</h3>

        <div class="row">
            @foreach($galleries as $gallery)
                <div class="col-lg-4 mb-30 col-md-6">
                    <div class="gallery-img">
                        <a class="image-popup" href="{{asset($gallery->image)}}"><img src="{{asset($gallery->image)}}" alt="" style="height: 300px"></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Events Section End -->

</div>

@endsection
