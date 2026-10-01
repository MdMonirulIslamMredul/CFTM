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
        <div class="gridFilter text-center mb-50">
            <button class="active" data-filter="*">ALL</button>
            <button data-filter=".filter1">SCIENCE</button>
            <button data-filter=".filter2">BUSINESS</button>
            <button data-filter=".filter3">HUMANITIES</button>
            <button data-filter=".filter4">DIPLOMA</button>
        </div>
        <div class="row grid">
            <div class="col-lg-4 col-md-6 grid-item filter1">
                <div class="courses-item mb-30">
                    <div class="img-part">
                        <img src="{{ asset('/') }}frontend/assets/images/courses/1.jpg" alt="">
                    </div>
                    <div class="content-part">
                        <ul class="meta-part">
                            <li><span class="price">$55.00</span></li>
                            <li><a class="categorie" href="#">Web Development</a></li>
                        </ul>
                        <h3 class="title"><a href="{{ route('course.details') }}">Become a PHP Master and Make Money Fast</a></h3>
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
                                <a href="#"><i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 grid-item filter4 filter1">
                <div class="courses-item mb-30">
                    <div class="img-part">
                        <img src="{{ asset('/') }}frontend/assets/images/courses/2.jpg" alt="">
                    </div>
                    <div class="content-part">
                        <ul class="meta-part">
                            <li><span class="price">$55.00</span></li>
                            <li><a class="categorie" href="#">Web Development</a></li>
                        </ul>
                        <h3 class="title"><a href="{{ route('course.details') }}">Learning jQuery Mobile for Beginners</a></h3>
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
                                <a href="#"><i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 grid-item filter3 filter2">
                <div class="courses-item mb-30">
                    <div class="img-part">
                        <img src="{{ asset('/') }}frontend/assets/images/courses/3.jpg" alt="">
                    </div>
                    <div class="content-part">
                        <ul class="meta-part">
                            <li><span class="price">$55.00</span></li>
                            <li><a class="categorie" href="{{ route('course.details') }}">Photography</a></li>
                        </ul>
                        <h3 class="title"><a href="{{ route('course.details') }}">The Art of Black and White Photography</a></h3>
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
                                <a href="#"><i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 grid-item filter1 filter2">
                <div class="courses-item mb-30">
                    <div class="img-part">
                        <img src="{{ asset('/') }}frontend/assets/images/courses/4.jpg" alt="">
                    </div>
                    <div class="content-part">
                        <ul class="meta-part">
                            <li><span class="price">$55.00</span></li>
                            <li><a class="categorie" href="#">Photography</a></li>
                        </ul>
                        <h3 class="title"><a href="course-single.html">Your Complete Guide to Dark Photography</a></h3>
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
                                <a href="#"><i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 grid-item filter2 filter4">
                <div class="courses-item mb-30">
                    <div class="img-part">
                        <img src="{{ asset('/') }}frontend/assets/images/courses/5.jpg" alt="">
                    </div>
                    <div class="content-part">
                        <ul class="meta-part">
                            <li><span class="price">$55.00</span></li>
                            <li><a class="categorie" href="#">Web Development</a></li>
                        </ul>
                        <h3 class="title"><a href="course-single.html">From Zero to Hero with Advance Nodejs</a></h3>
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
                                <a href="#"><i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 grid-item filter1 filter4">
                <div class="courses-item mb-30">
                    <div class="img-part">
                        <img src="{{ asset('/') }}frontend/assets/images/courses/6.jpg" alt="">
                    </div>
                    <div class="content-part">
                        <ul class="meta-part">
                            <li><span class="price">$55.00</span></li>
                            <li><a class="categorie" href="#">Web Development</a></li>
                        </ul>
                        <h3 class="title"><a href="course-single.html">Become a PHP Master and Make Money Fast</a></h3>
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
                                <a href="#"><i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
