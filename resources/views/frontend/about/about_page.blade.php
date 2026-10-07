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
        <h1 class="page-title">About Us</h1>
        <ul>
            <li>
                <a class="active" href="index.html">Home</a>
            </li>
            <li>About Us</li>
        </ul>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- About Section Redesign Start -->
<div id="rs-about" class="rs-about style3 pt-90 pb-90 md-pt-60 md-pb-60">
    <div class="container">
        <style>
            .cftm-about-section {
                font-family: 'Times New Roman', Times, Georgia, serif;
                max-width: 980px;
                margin: 0 auto;
                color: #111111;
            }
            .cftm-about-heading {
                font-size: 24px;
                font-weight: 700;
                color: #111111;
                margin-bottom: 20px;
                letter-spacing: 0.3px;
            }
            .cftm-about-desc {
                font-size: 17px;
                line-height: 1.8;
                color: #222222;
                margin-bottom: 40px;
                text-align: justify;
            }
            .cftm-affil-list {
                display: flex;
                flex-direction: column;
                gap: 22px;
                margin-bottom: 45px;
            }
            .cftm-affil-row {
                display: flex;
                align-items: center;
                gap: 24px;
            }
            .cftm-affil-logo {
                width: 120px;
                flex-shrink: 0;
                height: 80px;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 4px;
            }
            .cftm-affil-logo img {
                max-height: 76px;
                max-width: 100%;
                width: auto;
                object-fit: contain;
                display: block;
            }
            .cftm-affil-banner {
                flex: 1;
                background: linear-gradient(180deg, #3273c5 0%, #2561ab 100%);
                color: #ffffff !important;
                border-radius: 4px;
                padding: 16px 24px;
                text-align: center;
                font-size: 19px;
                font-weight: 700;
                line-height: 1.45;
                box-shadow: 0 5px 12px rgba(25, 65, 120, 0.28);
                transition: transform 0.25s ease, box-shadow 0.25s ease;
            }
            .cftm-affil-banner.cftm-italic {
                font-style: italic;
            }
            .cftm-affil-row:hover .cftm-affil-banner {
                transform: translateY(-2px);
                box-shadow: 0 7px 18px rgba(25, 65, 120, 0.38);
            }
            .cftm-coop-section {
                margin-top: 50px;
                padding-top: 10px;
            }
            .cftm-coop-title {
                font-size: 19px;
                font-weight: 700;
                color: #111111;
                margin-bottom: 25px;
                line-height: 1.5;
            }
            .cftm-coop-carousel-wrap {
                position: relative;
                width: 100%;
                overflow: hidden;
                padding: 10px 0;
            }
            .cftm-coop-carousel-wrap::before,
            .cftm-coop-carousel-wrap::after {
                content: "";
                position: absolute;
                top: 0;
                bottom: 0;
                width: 70px;
                z-index: 2;
                pointer-events: none;
            }
            .cftm-coop-carousel-wrap::before {
                left: 0;
                background: linear-gradient(to right, #ffffff, rgba(255, 255, 255, 0));
            }
            .cftm-coop-carousel-wrap::after {
                right: 0;
                background: linear-gradient(to left, #ffffff, rgba(255, 255, 255, 0));
            }
            .cftm-coop-marquee-track {
                display: flex;
                width: max-content;
                animation: cftmCoopMarquee 26s linear infinite;
                will-change: transform;
            }
            .cftm-coop-marquee-track:hover {
                animation-play-state: paused;
            }
            .cftm-coop-marquee-group {
                display: flex;
                align-items: center;
                gap: 20px;
                padding-right: 20px;
                flex-shrink: 0;
            }
            .cftm-coop-card {
                background: #ffffff;
                border: 1px solid #ebebeb;
                border-radius: 8px;
                padding: 12px 18px;
                display: flex;
                align-items: center;
                justify-content: center;
                width: 180px;
                height: 82px;
                flex-shrink: 0;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
                text-decoration: none !important;
                transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
            }
            .cftm-coop-card:hover {
                transform: translateY(-3px);
                border-color: #2b70c9;
                box-shadow: 0 6px 18px rgba(43, 112, 201, 0.18);
            }
            .cftm-coop-card img {
                max-height: 52px;
                max-width: 100%;
                width: auto;
                object-fit: contain;
                display: block;
            }
            @keyframes cftmCoopMarquee {
                0% {
                    transform: translate3d(0, 0, 0);
                }
                100% {
                    transform: translate3d(-50%, 0, 0);
                }
            }
            @media (max-width: 991px) {
                .cftm-affil-banner {
                    font-size: 17px;
                    padding: 14px 18px;
                }
                .cftm-coop-card {
                    width: 160px;
                    height: 76px;
                }
            }
            @media (max-width: 767px) {
                .cftm-affil-row {
                    flex-direction: column;
                    gap: 12px;
                    text-align: center;
                }
                .cftm-affil-logo {
                    width: 100%;
                    height: 70px;
                }
                .cftm-affil-banner {
                    width: 100%;
                    font-size: 15px;
                    padding: 12px 16px;
                }
                .cftm-about-heading {
                    font-size: 21px;
                }
                .cftm-about-desc {
                    font-size: 15px;
                    text-align: left;
                }
                .cftm-coop-title {
                    font-size: 16px;
                    text-align: center;
                }
                .cftm-coop-carousel-wrap::before,
                .cftm-coop-carousel-wrap::after {
                    width: 35px;
                }
                .cftm-coop-card {
                    width: 145px;
                    height: 72px;
                    padding: 10px 14px;
                }
            }
        </style>

        <div class="cftm-about-section">
            <!-- Header & Details -->
            <h2 class="cftm-about-heading"><u>{{ $about->title ?? 'About CFTM:' }}</u></h2>
            <div class="cftm-about-desc">
                {!! $about->page_details ?? 'College of Fashion Technology & Management (CFTM) established in the year 2010. CFTM develops skilled human resources for different professional sector. CFTM would like to contribute to our national economy by transferring human economy. Skill development activities of CFTM are stimulated by the apparel manufacturing industry, Footwear Industry and Creative IT industry.' !!}
            </div>

            <!-- Affiliation Banners -->
            <div class="cftm-affil-list">
                @if(isset($affiliations) && count($affiliations) > 0)
                    @foreach($affiliations as $affiliation)
                        <div class="cftm-affil-row">
                            <div class="cftm-affil-logo">
                                @if($affiliation->image && file_exists(public_path($affiliation->image)))
                                    <img src="{{ asset($affiliation->image) }}" alt="{{ $affiliation->institution_name ?? 'Affiliation Emblem' }}">
                                @endif
                            </div>
                            <div class="cftm-affil-banner {{ $affiliation->is_italic ? 'cftm-italic' : '' }}">
                                {{ $affiliation->title }}
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback if not configured in DB yet -->
                    <div class="cftm-affil-row">
                        <div class="cftm-affil-logo">
                            <img src="{{ asset('upload/affiliations/national_university.png') }}" alt="National University">
                        </div>
                        <div class="cftm-affil-banner">
                            CFTM is affiliated to National University, College Code: 6590.
                        </div>
                    </div>
                    <div class="cftm-affil-row">
                        <div class="cftm-affil-logo">
                            <img src="{{ asset('upload/affiliations/nsda.png') }}" alt="National Skills Development Authority">
                        </div>
                        <div class="cftm-affil-banner">
                            CFTM is affiliated with NSDA-CAA-DHA-00119
                        </div>
                    </div>
                    <div class="cftm-affil-row">
                        <div class="cftm-affil-logo">
                            <img src="{{ asset('upload/affiliations/bteb.png') }}" alt="Bangladesh Technical Education Board">
                        </div>
                        <div class="cftm-affil-banner">
                            CFTM is affiliated to Bangladesh Technical Education Board, College Code: 50323
                        </div>
                    </div>
                    <div class="cftm-affil-row">
                        <div class="cftm-affil-logo">
                            <img src="{{ asset('upload/affiliations/lasalle_college.png') }}" alt="LaSalle College International">
                        </div>
                        <div class="cftm-affil-banner">
                            Collaboration with largest private college in Canada, established in 1959.
                        </div>
                    </div>
                    <div class="cftm-affil-row">
                        <div class="cftm-affil-logo">
                            <img src="{{ asset('upload/affiliations/bgmea.png') }}" alt="BGMEA">
                        </div>
                        <div class="cftm-affil-banner cftm-italic">
                            Acknowledged by Bangladesh Garment Manufacturers & Exporters Association. BGMEA
                        </div>
                    </div>
                    <div class="cftm-affil-row">
                        <div class="cftm-affil-logo">
                            <img src="{{ asset('upload/affiliations/bkmea.png') }}" alt="BKMEA">
                        </div>
                        <div class="cftm-affil-banner cftm-italic">
                            Acknowledged by Bangladesh Knitwear Manufacturers & Exporters Association. BKMEA
                        </div>
                    </div>
                @endif
            </div>

            <!-- Cooperation Section -->
            <div class="cftm-coop-section">
                <h4 class="cftm-coop-title">CFTM provides the training in RMG sector of Bangladesh in Cooperation with:</h4>

                @php
                    $coopPartners = (isset($partners) && count($partners) > 0) ? $partners : collect([
                        (object)['name' => 'H&M', 'image' => 'upload/partner-images/partner_hm.png', 'url' => 'https://www2.hm.com/'],
                        (object)['name' => 'German Cooperation', 'image' => 'upload/partner-images/partner_german_cooperation.png', 'url' => 'https://www.bmz.de/en'],
                        (object)['name' => 'GIZ', 'image' => 'upload/partner-images/partner_giz.png', 'url' => 'https://www.giz.de/en/'],
                        (object)['name' => 'IFC - International Finance Corporation', 'image' => 'upload/partner-images/partner_ifc.png', 'url' => 'https://www.ifc.org/'],
                        (object)['name' => 'UK aid', 'image' => 'upload/partner-images/partner_ukaid.png', 'url' => 'https://www.gov.uk/international-development-funding'],
                        (object)['name' => 'European Union', 'image' => 'upload/partner-images/partner_eu.png', 'url' => 'https://european-union.europa.eu/']
                    ]);
                    $repeatMultiplier = (count($coopPartners) < 10) ? (int) ceil(10 / count($coopPartners)) : 1;
                @endphp

                <div class="cftm-coop-carousel-wrap">
                    <div class="cftm-coop-marquee-track">
                        {{-- Set 1 --}}
                        <div class="cftm-coop-marquee-group">
                            @for($i = 0; $i < $repeatMultiplier; $i++)
                                @foreach($coopPartners as $partner)
                                    @if(!empty($partner->url))
                                        <a href="{{ $partner->url }}" target="_blank" rel="noopener noreferrer" class="cftm-coop-card" title="{{ $partner->name }}">
                                            <img src="{{ asset($partner->image) }}" alt="{{ $partner->name }}">
                                        </a>
                                    @else
                                        <div class="cftm-coop-card" title="{{ $partner->name }}">
                                            <img src="{{ asset($partner->image) }}" alt="{{ $partner->name }}">
                                        </div>
                                    @endif
                                @endforeach
                            @endfor
                        </div>

                        {{-- Set 2 (Duplicate for continuous seamless infinite loop) --}}
                        <div class="cftm-coop-marquee-group" aria-hidden="true">
                            @for($i = 0; $i < $repeatMultiplier; $i++)
                                @foreach($coopPartners as $partner)
                                    @if(!empty($partner->url))
                                        <a href="{{ $partner->url }}" target="_blank" rel="noopener noreferrer" class="cftm-coop-card" tabindex="-1" title="{{ $partner->name }}">
                                            <img src="{{ asset($partner->image) }}" alt="{{ $partner->name }}">
                                        </a>
                                    @else
                                        <div class="cftm-coop-card" tabindex="-1" title="{{ $partner->name }}">
                                            <img src="{{ asset($partner->image) }}" alt="{{ $partner->name }}">
                                        </div>
                                    @endif
                                @endforeach
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Section Redesign End -->

<!-- Team Section Start -->
<div id="rs-team" class="rs-team style1 inner-style orange-color pt-94 pb-100 md-pt-64 md-pb-70 gray-bg">
    <div class="container">
        <div class="sec-title mb-50 md-mb-30 text-center">
            <div class="sub-title orange">Instructor</div>
            <h2 class="title mb-0">Expert Teachers</h2>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6 mb-30">
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
            </div>
            <div class="col-lg-4 col-sm-6 mb-30">
                <div class="team-item">
                    <img src="{{ asset('/')}}frontend/assets/images/team/2.jpg" alt="">
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
            </div>
            <div class="col-lg-4 col-sm-6 mb-30">
                <div class="team-item">
                    <img src="{{ asset('/')}}frontend/assets/images/team/3.jpg" alt="">
                    <div class="content-part">
                        <h4 class="name"><a href="#">Jhon Pedrocas</a></h4>
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
            <div class="col-lg-4 col-sm-6 md-mb-30">
                <div class="team-item">
                    <img src="{{ asset('/')}}frontend/assets/images/team/2.jpg" alt="">
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
            </div>
            <div class="col-lg-4 col-sm-6 xs-mb-30">
                <div class="team-item">
                    <img src="{{ asset('/')}}frontend/assets/images/team/3.jpg" alt="">
                    <div class="content-part">
                        <h4 class="name"><a href="#">Jhon Pedrocas</a></h4>
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
            <div class="col-lg-4 col-sm-6">
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
            </div>
        </div>
    </div>
</div>
<!-- Team Section End -->            

<!-- Testimonial Section Start -->
<div class="rs-testimonial style3 orange-color pt-90 md-pt-70">
    <div class="container">
        <div class="sec-title mb-60 md-mb-30 text-center">
            <div class="sub-title orange">Student Reviews</div>
            <h2 class="title mb-0">What Our Students Says</h2>
        </div>
        <div class="rs-carousel owl-carousel" data-loop="true" data-items="2" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="true" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="2" data-md-device-nav="false" data-md-device-dots="true">
            <div class="testi-item">
                <div class="row y-middle no-gutter">
                    <div class="col-md-4">
                        <div class="user-info">
                            <img src="{{ asset('/')}}frontend/assets/images/testimonial/style3/1.png" alt="">
                            <h4 class="name">Saiko Najran</h4>
                            <span class="designation">Student</span>
                            <ul class="ratings">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="desc">The charms of pleasure of the moment so blinded by desire that they cannot foresee the pain and trouble that are bound ensue and equal blame belongs to those who fail in their duty.</div>
                    </div>
                </div>
            </div>
            <div class="testi-item">
                <div class="row y-middle no-gutter">
                    <div class="col-md-4">
                        <div class="user-info">
                            <img src="{{ asset('/')}}frontend/assets/images/testimonial/style3/2.png" alt="">
                            <h4 class="name">Saiko Najran</h4>
                            <span class="designation">Student</span>
                            <ul class="ratings">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="desc">The charms of pleasure of the moment so blinded by desire that they cannot foresee the pain and trouble that are bound ensue and equal blame belongs to those who fail in their duty.</div>
                    </div>
                </div>
            </div>
            <div class="testi-item">
                <div class="row y-middle no-gutter">
                    <div class="col-md-4">
                        <div class="user-info">
                            <img src="{{ asset('/')}}frontend/assets/images/testimonial/style3/3.png" alt="">
                            <h4 class="name">Saiko Najran</h4>
                            <span class="designation">Student</span>
                            <ul class="ratings">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="desc">The charms of pleasure of the moment so blinded by desire that they cannot foresee the pain and trouble that are bound ensue and equal blame belongs to those who fail in their duty.</div>
                    </div>
                </div>
            </div>
            <div class="testi-item">
                <div class="row y-middle no-gutter">
                    <div class="col-md-4">
                        <div class="user-info">
                            <img src="{{ asset('/')}}frontend/assets/images/testimonial/style3/4.png" alt="">
                            <h4 class="name">Saiko Najran</h4>
                            <span class="designation">Student</span>
                            <ul class="ratings">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="desc">The charms of pleasure of the moment so blinded by desire that they cannot foresee the pain and trouble that are bound ensue and equal blame belongs to those who fail in their duty.</div>
                    </div>
                </div>
            </div>
            <div class="testi-item">
                <div class="row y-middle no-gutter">
                    <div class="col-md-4">
                        <div class="user-info">
                            <img src="{{ asset('/')}}frontend/assets/images/testimonial/style3/5.png" alt="">
                            <h4 class="name">Saiko Najran</h4>
                            <span class="designation">Student</span>
                            <ul class="ratings">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="desc">The charms of pleasure of the moment so blinded by desire that they cannot foresee the pain and trouble that are bound ensue and equal blame belongs to those who fail in their duty.</div>
                    </div>
                </div>
            </div>
            <div class="testi-item">
                <div class="row y-middle no-gutter">
                    <div class="col-md-4">
                        <div class="user-info">
                            <img src="{{ asset('/')}}frontend/assets/images/testimonial/style3/6.png" alt="">
                            <h4 class="name">Saiko Najran</h4>
                            <span class="designation">Student</span>
                            <ul class="ratings">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="desc">The charms of pleasure of the moment so blinded by desire that they cannot foresee the pain and trouble that are bound ensue and equal blame belongs to those who fail in their duty.</div>
                    </div>
                </div>
            </div>
            <div class="testi-item">
                <div class="row y-middle no-gutter">
                    <div class="col-md-4">
                        <div class="user-info">
                            <img src="{{ asset('/')}}frontend/assets/images/testimonial/style3/7.png" alt="">
                            <h4 class="name">Saiko Najran</h4>
                            <span class="designation">Student</span>
                            <ul class="ratings">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="desc">The charms of pleasure of the moment so blinded by desire that they cannot foresee the pain and trouble that are bound ensue and equal blame belongs to those who fail in their duty.</div>
                    </div>
                </div>
            </div>
            <div class="testi-item">
                <div class="row y-middle no-gutter">
                    <div class="col-md-4">
                        <div class="user-info">
                            <img src="{{ asset('/')}}frontend/assets/images/testimonial/style3/8.png" alt="">
                            <h4 class="name">Saiko Najran</h4>
                            <span class="designation">Student</span>
                            <ul class="ratings">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="desc">The charms of pleasure of the moment so blinded by desire that they cannot foresee the pain and trouble that are bound ensue and equal blame belongs to those who fail in their duty.</div>
                    </div>
                </div>
            </div>
            <div class="testi-item">
                <div class="row y-middle no-gutter">
                    <div class="col-md-4">
                        <div class="user-info">
                            <img src="{{ asset('/')}}frontend/assets/images/testimonial/style3/9.png" alt="">
                            <h4 class="name">Saiko Najran</h4>
                            <span class="designation">Student</span>
                            <ul class="ratings">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="desc">The charms of pleasure of the moment so blinded by desire that they cannot foresee the pain and trouble that are bound ensue and equal blame belongs to those who fail in their duty.</div>
                    </div>
                </div>
            </div>
            <div class="testi-item">
                <div class="row y-middle no-gutter">
                    <div class="col-md-4">
                        <div class="user-info">
                            <img src="{{ asset('/')}}frontend/assets/images/testimonial/style3/10.png" alt="">
                            <h4 class="name">Saiko Najran</h4>
                            <span class="designation">Student</span>
                            <ul class="ratings">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="desc">The charms of pleasure of the moment so blinded by desire that they cannot foresee the pain and trouble that are bound ensue and equal blame belongs to those who fail in their duty.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial Section End -->

<!-- Blog Section Start -->
{{-- <div id="rs-blog" class="rs-blog orange-color style1 modify1 pt-85 pb-100 md-pt-70 md-pb-70">
    <div class="container">
        <div class="sec-title mb-60 md-mb-30 text-center">
            <div class="sub-title orange">News Update </div>
            <h2 class="title mb-0">Latest News & Events</h2>
        </div>
        <div class="row">
            <div class="col-lg-7 pr-60 md-pr-15 md-mb-30">
                <div class="row no-gutter white-bg blog-item mb-35">
                    <div class="col-md-6">
                        <div class="image-part">
                            <a href="#"><img src="{{ asset('/')}}frontend/assets/images/blog/style3/1.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="blog-content">
                            <ul class="blog-meta">
                                <li><i class="fa fa-user-o"></i> Admin</li>
                                <li><i class="fa fa-calendar"></i>June 15, 2019</li>
                            </ul>
                            <h3 class="title"><a href="blog-single.html">Modern School The Lovely Valley Team Work</a></h3>
                            <div class="btn-part">
                                <a class="readon-arrow" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row no-gutter white-bg blog-item">
                    <div class="col-md-6 order-last">
                        <div class="image-part">
                            <a href="#"><img src="{{ asset('/')}}frontend/assets/images/blog/style3/2.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="blog-content">
                            <ul class="blog-meta">
                                <li><i class="fa fa-user-o"></i> Admin</li>
                                <li><i class="fa fa-calendar"></i>June 15, 2019</li>
                            </ul>
                            <h3 class="title"><a href="blog-single.html">High School Program Starting Soon 2021</a></h3>
                            <div class="btn-part">
                                <a class="readon-arrow" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 lg-pl-0">
                <div class="events-short mb-28">
                    <div class="date-part bgc1">
                        <span class="month">June</span>
                        <div class="date">20</div>
                    </div>
                    <div class="content-part">
                        <div class="categorie">
                            <a href="#">Math</a> & <a href="#">English</a>
                        </div>
                        <h4 class="title mb-0"><a href="blog-single.html">Educational Technology and Mobile Accessories Learning</a></h4>
                    </div>
                </div>
                <div class="events-short mb-28">
                    <div class="date-part bgc2">
                        <span class="month">June</span>
                        <div class="date">21</div>
                    </div>
                    <div class="content-part">
                        <div class="categorie">
                            <a href="#">Math</a> & <a href="#">English</a>
                        </div>
                        <h4 class="title mb-0"><a href="blog-single.html">Educational Technology and Mobile Accessories Learning</a></h4>
                    </div>
                </div>
                <div class="events-short mb-28">
                    <div class="date-part bgc3">
                        <span class="month">June</span>
                        <div class="date">22</div>
                    </div>
                    <div class="content-part">
                        <div class="categorie">
                            <a href="#">Math</a> & <a href="#">English</a>
                        </div>
                        <h4 class="title mb-0"><a href="blog-single.html">Educational Technology and Mobile Accessories Learning</a></h4>
                    </div>
                </div>
                <div class="events-short">
                    <div class="date-part bgc4">
                        <span class="month">June</span>
                        <div class="date">23</div>
                    </div>
                    <div class="content-part">
                        <div class="categorie">
                            <a href="#">Math</a> & <a href="#">English</a>
                        </div>
                        <h4 class="title mb-0"><a href="blog-single.html">Educational Technology and Mobile Accessories Learning</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Blog Section End -->
@endsection
