@extends('frontend.master')
@section('title')
    Blogs
@endsection
@section('content')
<!-- Breadcrumbs Start -->
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs breadcrumbs-overlay">
    <div class="breadcrumbs-img">
        <img src="{{ asset('/') }}frontend/assets/images/breadcrumbs/2.jpg" alt="Breadcrumbs Image">
    </div>
    <div class="breadcrumbs-text white-color">
        <h1 class="page-title">Blog</h1>
        <ul>
            <li>
                <a class="active" href="index.html">Home</a>
            </li>
            <li>Blog</li>
        </ul>
    </div>
</div>
<!-- Breadcrumbs End -->            
<!-- Blogs Section Start -->
<div class="rs-event orange-color pt-100 pb-100 md-pt-70 md-pb-70">
    <div class="container">
        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-lg-4 mb-60 col-md-6">
                <div class="event-item">
                    <div class="event-short">
                       <div class="featured-img">
                           <img src="{{ $blog->main_image }}" alt="Image" class="w-100">
                       </div>
                       {{-- <div class="categorie">
                           <a href="#"></a>
                       </div> --}}
                       <div class="content-part">
                           {{-- <div class="address"><i class="fa fa-map-o"></i> New Margania</div> --}}
                           <h4 class="title"><a href="{{ route('blogs.details',$blog->id) }}">{{ $blog->title }}</a></h4>
                           <p class="text">
                              {!! $blog->short_details !!}
                           </p>
                           <div class="event-btm">
                               <div class="date-part">
                                   <div class="date">
                                       <i class="fa fa-calendar-check-o"></i>
                                       {{ $blog->created_at }} 
                                   </div>
                               </div>
                               <div class="btn-part">
                                   <a href="{{ route('blogs.details',$blog->id) }}">Read More</a>
                               </div>
                           </div>
                       </div> 
                    </div>
                </div>
            </div>     
            @endforeach
        </div>
    </div> 
</div>
<!-- Blogs Section End --> 
 
@endsection
