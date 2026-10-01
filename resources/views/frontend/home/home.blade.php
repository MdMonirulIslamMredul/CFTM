@extends('frontend.master')

@section('title')
    Home
@endsection

@section('content')
<style>
    /* Performance & Smooth Scrolling */
    html {
        scroll-behavior: smooth;
    }
    .menu-sticky.sticky {
        will-change: transform;
        transform: translateZ(0);
    }
    .rs-slider img {
        object-fit: cover;
        width: 100%;
    }
    .image-grid img, .degree-wrap img {
        object-fit: cover;
        width: 100%;
    }
    /* Snappy scroll reveal animations */
    .wow {
        animation-duration: 600ms !important;
    }
    .desc.big.white-color h1,
    .desc.big.white-color h2,
    .desc.big.white-color h3,
    .desc.big.white-color h4,
    .desc.big.white-color h5,
    .desc.big.white-color h6 {
        color: #ffffff;
    }
</style>
 <!-- Slider Section Start -->
 <div class="container-fluid">
    <div class="rs-slider style1 ">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                @foreach ($banners as $key =>$banner)
                {{-- {{ dd($banner) }} --}}
                <div class="carousel-item {{$key == 0?'active':''}}">
                    <img src="{{ asset($banner->image1) }}" class="d-block w-100" alt="Slide 1" style="height: 500px; object-fit: cover;">
                   
                </div>
                @endforeach
               
                
                <!-- Add more carousel items here -->
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    </div>
    
 </div>
<!-- Slider Section End -->

<!-- Services Section Start -->
<div class="rs-services style1">
    <div class="row no-gutter">
        <div class="col-lg-3 col-md-6">
            <div class="service-item overly1">
                <img src="{{ asset('/') }}frontend/assets/images/services/1.jpg" alt="" loading="lazy">
                <div class="content-part">
                    <img src="{{ asset('/') }}frontend/assets/images/services/icons/1.png" alt="" loading="lazy">
                    <h4 class="title"><a href="#">University Life</a></h4>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="service-item overly2">
                <img src="{{ asset('/') }}frontend/assets/images/services/1.jpg" alt="" loading="lazy">
                <div class="content-part">
                    <img src="{{ asset('/') }}frontend/assets/images/services/icons/2.png" alt="" loading="lazy">
                    <h4 class="title"><a href="#">Graduation</a></h4>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="service-item overly3">
                <img src="{{ asset('/') }}frontend/assets/images/services/1.jpg" alt="" loading="lazy">
                <div class="content-part">
                    <img src="{{ asset('/') }}frontend/assets/images/services/icons/3.png" alt="" loading="lazy">
                    <h4 class="title"><a href="{{ asset('/') }}frontend/#">Athletics</a></h4>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="service-item overly4">
                <img src="{{ asset('/') }}frontend/assets/images/services/1.jpg" alt="" loading="lazy">
                <div class="content-part">
                    <img src="{{ asset('/') }}frontend/assets/images/services/icons/1.png" alt="" loading="lazy">
                    <h4 class="title"><a href="{{ asset('/') }}frontend/#">Social</a></h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Services Section End -->

<!-- About Section Start -->
<div id="rs-about" class="rs-about style2 pt-94 pb-100 md-pt-64 md-pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 pr-65 md-pr-15 md-mb-50">
                <div class="about-intro">
                    <div class="sec-title mb-40 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="600ms">
                        <div class="sub-title primary">About {{$logo->site_name}}</div>
                        <h2 class="title mb-21 white-color">{{ $about->title }}</h2>
                        <div class="desc big white-color">{!! $about->details1 !!}</div>
                    </div>
                    <div class="btn-part wow fadeInUp" data-wow-delay="400ms" data-wow-duration="600ms">
                        <a class="readon2" href="{{ route('about.page') }}">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 lg-pl-0 ml--25 md-ml-0">
                <div class="row rs-counter couter-area mb-40">
                    <div class="col-md-4">
                        <div class="counter-item one">
                            <h2 class="number rs-count kplus">2</h2>
                            <h4 class="title mb-0">Students</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="counter-item two">
                            <h2 class="number rs-count">3.50</h2>
                            <h4 class="title mb-0">Average CGPA</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="counter-item three">
                            <h2 class="number rs-count percent">95</h2>
                            <h4 class="title mb-0">Graduates</h4>
                        </div>
                    </div>
                </div>
                <div class="row grid-area">
                    @foreach ($galleries as $gallery)
                    <div class="col-md-6 sm-mb-30">
                        <div class="image-grid">
                            <img src="{{ asset($gallery->image) }}" alt="" style="height: 300px; width: 100%; object-fit: cover;" loading="lazy">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Section End -->

<!-- Degree Section Start -->
<div class="rs-degree style1 modify gray-bg pt-100 pb-70 md-pt-70 md-pb-40">
    <div class="container">
        <div class="row y-middle">
            <div class="col-lg-4 col-md-6 mb-30">
                <div class="sec-title wow fadeInUp" data-wow-delay="300ms" data-wow-duration="600ms">
                    <div class="sub-title primary">Degree categoris</div>
                    <h2 class="title mb-0">Successfully Complete A Degree at {{ $logo->site_name }}</h2>
                </div>
            </div>
            @foreach ($categories as $category)
            <div class="col-lg-4 col-md-6 mb-30">
                <div class="degree-wrap">
                    <img src="{{ asset($category->image) }}" alt="Image" style="height: 300px; width: 100%; object-fit: cover;" loading="lazy">
                    <div class="title-part">
                        <h4 class="title">{{ $category->name }}</h4>
                    </div>
                    <div class="content-part">
                        <h4 class="title"><a href="#">{{ $category->name }}</a></h4>
                        <p class="desc">{{ $category->description }}</p>
                        <div class="btn-part">
                            <a href="{{ asset('/') }}frontend/#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
           
            
        </div>
    </div>
</div>
<!-- Degree Section End -->

<!-- CTA Section Start -->
<div class="rs-cta style2">
    <div class="partition-bg-wrap home2">
        <div class="container">
            @php
            // Extract video ID from YouTube URL
            $video_url = $video->video_link;
            $parts = explode('=', $video_url); // Split the URL by '='
            $video_id = end($parts); // Get the last element of the array, which is the video ID
        @endphp
            <div class="row y-bottom">
                <div class="col-lg-6 pb-50 md-pt-100 md-pb-100">
                    <div class="video-wrap">
                        <a class="popup-videos" href="https://www.youtube.com/watch?v={{ $video_id }}">
                            <i class="fa fa-play"></i>
                            <h4 class="title mb-0">Take a Video  Tour at {{ $logo->site_name }}</h4>
                        </a>
                        
                    </div>
                </div>
                <div class="col-lg-6 pl-62 pt-134 pb-150 md-pl-15 md-pt-45 md-pb-50">
                    <div class="sec-title mb-40 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                        <h2 class="title mb-16">{{ $admission->title }}</h2>
                        <div class="desc">{!! $admission->details1 !!}</div>
                    </div>
                    <div class="btn-part wow fadeInUp" data-wow-delay="400ms" data-wow-duration="2000ms">
                        <a class="readon2" href="{{ route('admission.page') }}">Apply Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CTA Section End -->

<!-- Latest Events Section Start -->
{{-- <div class="rs-latest-events style1 bg-wrap pt-100 md-pt-70 md-pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 pr-65 pt-24 md-pt-0 md-pr-15 md-mb-30">
                <div class="sec-title mb-42">
                    <div class="sub-title primary">Latest Events</div>
                    <h2 class="title mb-0">Educavo Events</h2>
                </div>
                <div class="single-img wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                    <img src="{{ asset('/') }}frontend/assets/images/event/single.jpg" alt="Event Image">
                </div>
            </div>
            <div class="col-lg-6 lg-pl-0">
                <div class="event-wrap">
                    <div class="events-short mb-30 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                        <div class="date-part bgc1">
                            <span class="month">June</span>
                            <div class="date">20</div>
                        </div>
                        <div class="content-part">
                            <div class="categorie">
                                <a href="{{ asset('/') }}frontend/#">Math</a> & <a href="{{ asset('/') }}frontend/#">English</a>
                            </div>
                            <h4 class="title mb-0"><a href="{{ asset('/') }}frontend/#">Educational Technology and Mobile Accessories Learning</a></h4>
                        </div>
                    </div>
                    <div class="events-short mb-30 wow fadeInUp" data-wow-delay="400ms" data-wow-duration="2000ms">
                        <div class="date-part bgc2">
                            <span class="month">June</span>
                            <div class="date">21</div>
                        </div>
                        <div class="content-part">
                            <div class="categorie">
                                <a href="{{ asset('/') }}frontend/#">Math</a> & <a href="{{ asset('/') }}frontend/#">English</a>
                            </div>
                            <h4 class="title mb-0"><a href="{{ asset('/') }}frontend/#">Educational Technology and Mobile Accessories Learning</a></h4>
                        </div>
                    </div>
                    <div class="events-short wow fadeInUp" data-wow-delay="500ms" data-wow-duration="2000ms">
                        <div class="date-part bgc3">
                            <span class="month">June</span>
                            <div class="date">22</div>
                        </div>
                        <div class="content-part">
                            <div class="categorie">
                                <a href="{{ asset('/') }}frontend/#">Math</a> & <a href="{{ asset('/') }}frontend/#">English</a>
                            </div>
                            <h4 class="title mb-0"><a href="{{ asset('/') }}frontend/#">Educational Technology and Mobile Accessories Learning</a></h4>
                        </div>
                    </div>
                    <div class="btn-part mt-55 md-mt-25 wow fadeInUp" data-wow-delay="600ms" data-wow-duration="2000ms">
                        <a href="{{ asset('/') }}frontend/#">View All Events</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Latest Events Section End -->

<!-- Partner Start -->
<div class="rs-partner pt-100 pb-100 md-pt-70 md-pb-70 gray-bg">
    <div class="container">
        <div class="rs-carousel owl-carousel" data-loop="true" data-items="5" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="3" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="5" data-md-device-nav="false" data-md-device-dots="false">
            <div class="partner-item">
                <a href="{{ asset('/') }}frontend/#"><img src="{{ asset('/') }}frontend/assets/images/partner/1.png" alt=""></a>
            </div>
            <div class="partner-item">
                <a href="{{ asset('/') }}frontend/#"><img src="{{ asset('/') }}frontend/assets/images/partner/2.png" alt=""></a>
            </div>
            <div class="partner-item">
                <a href="{{ asset('/') }}frontend/#"><img src="{{ asset('/') }}frontend/assets/images/partner/3.png" alt=""></a>
            </div>
            <div class="partner-item">
                <a href="{{ asset('/') }}frontend/#"><img src="{{ asset('/') }}frontend/assets/images/partner/4.png" alt=""></a>
            </div>
            <div class="partner-item">
                <a href="{{ asset('/') }}frontend/#"><img src="{{ asset('/') }}frontend/assets/images/partner/5.png" alt=""></a>
            </div>
            <div class="partner-item">
                <a href="{{ asset('/') }}frontend/#"><img src="{{ asset('/') }}frontend/assets/images/partner/6.png" alt=""></a>
            </div>
        </div>
    </div>
</div>
<!-- Partner End -->

<!-- Testimonial Section Start -->
{{-- <div class="rs-testimonial style2 pt-100 pb-100 md-pt-70 md-pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 pr-90 md-pr-15 md-mb-30">
                <div class="donation-part wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                    <img src="{{ asset('/') }}frontend/assets/images/donor/1.jpg" alt="">
                    <h3 class="title mb-10">Donation helps us</h3>
                    <div class="desc mb-38">Lorem ipsum dolor sit amet, consectetur adipisic ing elit, sed eius to mod tempors incididunt ut labore et dolore magna this aliqua  enims ad minim.</div>
                    <div class="btn-part">
                        <a class="readon2 mod" href="{{ asset('/') }}frontend/#">Become a donor</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 lg-pl-0 ml--15 md-ml-0">
                <div class="testi-wrap mb-50 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                    <div class="img-part">
                        <img src="{{ asset('/') }}frontend/assets/images/testimonial/style2/1.jpg" alt="">
                    </div>
                    <div class="content-part pt-12">
                        <div class="desc">Education is the passport to the future for tomorrow belongs to those who prepare for it today</div>
                        <div class="info">
                            <h5 class="name">Mahadi mansura</h5>
                            <div class="designation">Head Teacher</div>
                        </div>
                    </div>
                </div>
                <div class="testi-wrap wow fadeInUp" data-wow-delay="400ms" data-wow-duration="2000ms">
                    <div class="img-part">
                        <img src="{{ asset('/') }}frontend/assets/images/testimonial/style2/2.jpg" alt="">
                    </div>
                    <div class="content-part pt-12">
                        <div class="desc">Education is the passport to the future for tomorrow belongs to those who prepare for it today</div>
                        <div class="info">
                            <h5 class="name">Jonathon Lary</h5>
                            <div class="designation">Math Teacher</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Testimonial Section End -->

<!-- Section Gray bg Wrap start -->
<div class="gray-bg">
    <!-- Blog Section Start -->
    <div id="rs-blog" class="rs-blog style2 pt-94 pb-100 md-pt-64 md-pb-70">
        <div class="container">
            <div class="sec-title mb-60 text-center">
                <div class="sub-title primary">Blogs Update </div>
                <h2 class="title mb-0">Latest News & Blogs</h2>
            </div>
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="3" data-md-device-nav="false" data-md-device-dots="false">
                @foreach ($blogs as $blog)
                <div class="blog-item">
                    <div class="image-part">
                        <img src="{{ asset($blog->main_image) }}" alt="" class="w-100" loading="lazy">
                    </div>
                    <div class="blog-content new-style">
                        <ul class="blog-meta">
                            <li><i class="fa fa-user-o"></i> Admin</li>
                            <li><i class="fa fa-calendar"></i>{{ $blog->created_at->toDayDateTimeString() }}</li>
                        </ul>
                        <h3 class="title"><a href="{{ asset('/') }}frontend/blog-single.html">{{ $blog->title }}</a></h3>
                        <div class="desc">{!! $blog->short_details !!}</div>
                        <ul class="blog-bottom">
                            <li class="cmnt-part"><a href="{{ asset('/') }}frontend/#">(12) Comments</a></li>
                            <li class="btn-part"><a class="readon-arrow" href="{{ route('blogs.details',$blog->id) }}">Read More</a></li>
                        </ul>
                    </div>
                </div>
                @endforeach
                
               
            </div>
        </div>
    </div>
    <!-- Blog Section End -->

    <!-- Newsletter section start -->
    <div class="rs-newsletter style1 mb--124 sm-mb-0 sm-pb-70">
        <div class="container">
            <div class="newsletter-wrap">
                <div class="row y-middle">
                    <div class="col-md-6 sm-mb-30">
                        <div class="sec-title">
                            <div class="sub-title white-color">Newsletter</div>
                            <h2 class="title mb-0 white-color">Subscribe Us to join <br> Our Community </h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form class="newsletter-form">
                            <input type="email" name="email" placeholder="Enter Your Email" required="">
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter section end -->
</div>
<!-- Section bg Wrap 2 End -->
{{-- <script>
    $('#custom-carousel').carousel({
    interval: 5000, // Adjust interval as needed
    pause: 'hover',
    wrap: true
});

</script> --}}
@endsection
