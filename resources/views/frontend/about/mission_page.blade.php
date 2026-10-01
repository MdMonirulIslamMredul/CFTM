@extends('frontend.master')

@section('title')
    About
@endsection

@section('content')
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src="{{ asset('/')}}frontend/assets/images/breadcrumbs/2.jpg" alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h1 class="page-title">Mission & Vision</h1>
            <ul>
                <li>
                    <a class="active" href="index.html">Home</a>
                </li>
                <li>Mission & Vision</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- About Section Start -->
    <div id="rs-about" class="rs-about style1 pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-last padding-0 md-pl-15 md-pr-15 md-mb-30">
                    <div class="img-part">
                        <img class="" src="{{ asset($about->image2)}}" alt="About Image">
                    </div>
                </div>
                <div class="col-lg-6 pr-70 md-pr-15">
                    <div class="sec-title">
                        <div class="sub-title orange">About Educavo</div>
                        <h2 class="title mb-17">Welcome to The {{ $about->title }}</h2>
                        <div class="bold-text mb-22">{!! $about->details1 !!}</div>
                        {{-- <div class="desc">{!! $about->details2 !!}</div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->

    <!-- CTA Section Start -->
    {{-- <div class="rs-cta style2">
        <div class="partition-bg-wrap inner-page">
            <div class="container">
                <div class="row y-bottom">
                    <div class="col-lg-6 pb-50 md-pt-70 md-pb-70">
                        <div class="video-wrap">
                            <a class="popup-videos" href="https://www.youtube.com/watch?v=atMUy_bPoQI">
                                <i class="fa fa-play"></i>
                                <h4 class="title mb-0">Take a Video Tour at Educavo</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 pl-62 pt-134 pb-150 md-pt-50 md-pb-50 md-pl-15">
                        <div class="sec-title mb-40 md-mb-20">
                            <h2 class="title mb-16">Admission Open for 2020</h2>
                            <div class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eius to mod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enims ad minim veniam. Aenean massa.
                                Cum sociis natoque penatibus et magnis.</div>
                        </div>
                        <div class="btn-part">
                            <a class="readon2 orange" href="#">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- CTA Section End -->

    <!-- Counter Section Start -->
    <div id="rs-counter" class="rs-counter style2-about pt-100 md-pt-70">
        <div class="container">
            <div class="row couter-area">
                <div class="col-md-4 sm-mb-30">
                    <div class="counter-item text-center">
                        <div class="counter-bg">
                            <img src="{{ asset('/')}}frontend/assets/images/counter/bg1.png" alt="Counter Image">
                        </div>
                        <div class="counter-text">
                            <h2 class="rs-count kplus">2</h2>
                            <h4 class="title mb-0">Students</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 sm-mb-30">
                    <div class="counter-item text-center">
                        <div class="counter-bg">
                            <img src="{{ asset('/')}}frontend/assets/images/counter/bg2.png" alt="Counter Image">
                        </div>
                        <div class="counter-text">
                            <h2 class="rs-count">3.50</h2>
                            <h4 class="title mb-0">Average CGPA</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="counter-item text-center">
                        <div class="counter-bg">
                            <img src="{{ asset('/')}}frontend/assets/images/counter/bg3.png" alt="Counter Image">
                        </div>
                        <div class="counter-text">
                            <h2 class="rs-count percent">95</h2>
                            <h4 class="title mb-0">Graduates</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Counter Section End -->

    <!-- About Section Start -->
    <div class="rs-about style1 pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 padding-0 md-pl-15 md-pr-15 md-mb-30">
                    <div class="img-part">
                        <img class="" src="{{ asset($about->image1)}}" alt="About Image">
                    </div>
                    <ul class="nav nav-tabs histort-part" id="myTab" role="tablist">
                        <li class="nav-item tab-btns single-history">
                            <a class="nav-link tab-btn active" id="about-history-tab" data-toggle="tab"
                                href="#about-history" role="tab" aria-controls="about-history"
                                aria-selected="true"><span class="icon-part"><i
                                        class="flaticon-banknote"></i></span>History</a>
                        </li>
                        <li class="nav-item tab-btns single-history">
                            <a class="nav-link tab-btn" id="about-mission-tab" data-toggle="tab" href="#about-mission"
                                role="tab" aria-controls="about-mission" aria-selected="false"><span
                                    class="icon-part"><i class="flaticon-flower"></i></span>Mission & Vission</a>
                        </li>
                        <li class="nav-item tab-btns single-history last-item">
                            <a class="nav-link tab-btn" id="about-admin-tab" data-toggle="tab" href="#about-admin"
                                role="tab" aria-controls="about-admin" aria-selected="false"><span
                                    class="icon-part"><i class="flaticon-analysis"></i></span>Administration</a>
                        </li>
                    </ul>
                </div>
                <div class="offset-lg-1"></div>
                <div class="col-lg-5">
                    <div class="tab-content tabs-content" id="myTabContent">
                        <div class="tab-pane tab fade show active" id="about-history" role="tabpanel"
                            aria-labelledby="about-history-tab">
                            <div class="sec-title mb-25">
                                <h2 class="title">Educavo History</h2>
                                <div class="desc">{!!  $about->details2 !!}</div>
                            </div>
                            <div class="tab-img">
                                <img class="" src="{{ asset('/')}}frontend/assets/images/about/tab1.jpg" alt="Tab Image">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="about-mission" role="tabpanel"
                            aria-labelledby="about-mission-tab">
                            <div class="sec-title mb-25">
                                <h2 class="title">Educavo Mission</h2>
                                <div class="desc">{!!  $about->details3 !!}</div>
                            </div>
                            <div class="tab-img">
                                <img class="" src="{{ asset('/')}}frontend/assets/images/about/tab2.jpg" alt="Tab Image">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="about-admin" role="tabpanel" aria-labelledby="about-admin-tab">
                            <div class="sec-title mb-25">
                                <h2 class="title">Educavo Administration</h2>
                                <div class="desc">At vero eos et accusamus et iusto odio dignissimos ducimus qui blan
                                    ditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias
                                    excepturi sint occaecati cupiditate non provident, sim ilique sunt in culpa.</div>
                            </div>
                            <div class="tab-img">
                                <img class="" src="{{ asset('/')}}frontend/assets/images/about/tab3.jpg" alt="Tab Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Intro Info Tabs-->
            <div class="intro-info-tabs">

            </div>
        </div>
    </div>
    <!-- About Section End -->

    <!-- Team Section Start -->
    <div id="rs-team" class="rs-team style1 orange-color pt-94 pb-100 md-pt-64 md-pb-70 gray-bg">
        <div class="container">
            <div class="sec-title mb-50 md-mb-30">
                <div class="sub-title orange">Instructor</div>
                <h2 class="title mb-0">Expert Teachers</h2>
            </div>
            <div class="rs-carousel owl-carousel nav-style2 orange-color" data-loop="true" data-items="3"
                data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000"
                data-smart-speed="800" data-dots="false" data-nav="true" data-nav-speed="false"
                data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false"
                data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false"
                data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false"
                data-ipad-device-dots2="false" data-md-device="3" data-md-device-nav="true" data-md-device-dots="false">
                <div class="team-item">
                    <img src="{{ asset('/')}}frontend/assets/images/team/1.jpg" alt="">
                    <div class="content-part">
                        <h4 class="name"><a href="team-single.html">Jhon Pedrocas</a></h4>
                        <span class="designation">Professor</span>
                        <ul class="social-links">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="team-item">
                    <img src="{{ asset('/')}}frontend/assets/images/team/2.jpg" alt="">
                    <div class="content-part">
                        <h4 class="name"><a href="team-single.html">Jesika Albenian</a></h4>
                        <span class="designation">Professor</span>
                        <ul class="social-links">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="team-item">
                    <img src="{{ asset('/')}}frontend/assets/images/team/3.jpg" alt="">
                    <div class="content-part">
                        <h4 class="name"><a href="team-single.html">Alex Anthony</a></h4>
                        <span class="designation">Professor</span>
                        <ul class="social-links">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team Section End -->

    <!-- Testimonial Section Start -->
    <div class="rs-testimonial style2 pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 pr-90 md-pr-15 md-mb-30">
                    <div class="donation-part">
                        <img src="{{ asset('/')}}frontend/assets/images/donor/1.jpg" alt="">
                        <h3 class="title mb-10">Donation helps us</h3>
                        <div class="desc mb-38">Lorem ipsum dolor sit amet, consectetur adipisic ing elit, sed eius to mod
                            tempors incididunt ut labore et dolore magna this aliqua enims ad minim.</div>
                        <div class="btn-part">
                            <a class="readon2 orange" href="#">Become a donor</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 lg-pl-0 ml--15 md-ml-0">
                    <div class="testi-wrap mb-50">
                        <div class="img-part">
                            <img src="{{ asset('/')}}frontend/assets/images/testimonial/style2/1.jpg" alt="">
                        </div>
                        <div class="content-part new-content pt-12">
                            <div class="desc">Education is the passport to the future for tomorrow belongs to those who
                                prepare for it today</div>
                            <div class="info">
                                <h5 class="name">Mahadi mansura</h5>
                                <div class="designation">Head Teacher</div>
                            </div>
                        </div>
                    </div>
                    <div class="testi-wrap">
                        <div class="img-part">
                            <img src="{{ asset('/')}}frontend/assets/images/testimonial/style2/2.jpg" alt="">
                        </div>
                        <div class="content-part new-content pt-12">
                            <div class="desc">Education is the passport to the future for tomorrow belongs to those who
                                prepare for it today</div>
                            <div class="info">
                                <h5 class="name">Jonathon Lary</h5>
                                <div class="designation">Math Teacher</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial Section End -->

    <!-- Partner Start -->
    <div class="rs-partner pb-100 md-pb-70">
        <div class="container">
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="5" data-margin="30" data-autoplay="true"
                data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false"
                data-nav="true" data-nav-speed="false" data-center-mode="false" data-mobile-device="1"
                data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2"
                data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2"
                data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="5"
                data-md-device-nav="true" data-md-device-dots="false">
                <div class="partner-item">
                    <a href="#"><img src="{{ asset('/')}}frontend/assets/images/partner/1.png" alt=""></a>
                </div>
                <div class="partner-item">
                    <a href="#"><img src="{{ asset('/')}}frontend/assets/images/partner/2.png" alt=""></a>
                </div>
                <div class="partner-item">
                    <a href="#"><img src="{{ asset('/')}}frontend/assets/images/partner/3.png" alt=""></a>
                </div>
                <div class="partner-item">
                    <a href="#"><img src="{{ asset('/')}}frontend/assets/images/partner/4.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner End -->
@endsection
