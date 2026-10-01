@extends('frontend.master')
@section('title')
    Blogs
@endsection
@section('content')
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs breadcrumbs-overlay">
    <div class="breadcrumbs-img">
        <img src="{{ asset('/') }}frontend/assets/images/breadcrumbs/2.jpg" alt="Breadcrumbs Image">
    </div>
    <div class="breadcrumbs-text white-color">
        <h1 class="page-title">Course Grid 02</h1>
        <ul>
            <li>
                <a class="active" href="index.html">Home</a>
            </li>
            <li>Course</li>
        </ul>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- Popular Courses Section Start -->
<div id="rs-popular-courses" class="rs-popular-courses style1 orange-color pt-100 pb-100 md-pt-70 md-pb-70">
    <div class="container">
        {{-- <div class="gridFilter text-center mb-50">
            <button class="active" data-filter="*">ALL</button>
            @foreach ($categories as $category)
            <button data-filter=".filter{{ $category->id }}">{{ $category->name }}</button>
            @endforeach
        </div> --}}
        <div class="row grid">
            @foreach ($courses as $course)
            <div class="col-lg-4 col-md-6 grid-item filter{{ $course->category_id }}">
                <div class="courses-item mb-30">
                    <div class="img-part">
                        <img src="{{ asset($course->main_image) }}" alt="" style="height: 200px">
                    </div>
                    <div class="content-part">
                        <ul class="meta-part">
                            {{-- <li><span class="price">$55.00</span></li> --}}
                            <li><a class="categorie" href="#">{{ $course->category->name ?? null }}</a></li>
                            <li><a class="categorie" href="#">{{ $category->name ?? $subCategory->name ?? null }}</a></li>
                            
                            
                        </ul>
                        <h3 class="title"><a href="{{ route('courses.details',$course->id) }}">{{ $course->course_title }}</a></h3>
                        <div class="bottom-part">
                            <div class="info-meta">
                                <ul>
                                    <li class="user"><i class="fa fa-user"></i> 245</li>
                                    <li class="ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        (05)
                                    </li>
                                </ul>
                            </div>
                            <div class="btn-part">
                                <a href="{{ route('courses.details',$course->id) }}"><i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
           
        </div>
        <div class="pagination-area orange-color text-center mt-30 md-mt-0">
            <ul class="pagination-part">
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">Next <i class="fa fa-long-arrow-right"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<!-- Popular Courses Section End -->  
@endsection
