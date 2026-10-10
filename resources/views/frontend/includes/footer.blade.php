<style>
    /* ========================================================
       Professional Redesigned Footer (Preserves Original BG)
       ======================================================== */
    /* Remove the massive default 218px padding */
    .rs-footer .footer-top {
        padding: 55px 0 35px !important;
    }
    .rs-footer .footer-bottom {
        padding: 20px 0 !important;
        background: rgba(0, 0, 0, 0.15) !important;
        border-top: 1px solid rgba(255, 255, 255, 0.12) !important;
    }
    .rs-footer .footer-bottom:before {
        display: none !important;
    }

    /* Widget Titles */
    .rs-footer .widget-title {
        color: #ffffff !important;
        font-size: 17px !important;
        line-height: 1.3 !important;
        font-weight: 700 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.8px !important;
        margin-bottom: 22px !important;
        position: relative !important;
        padding-bottom: 10px !important;
        font-family: 'Poppins', sans-serif !important;
    }
    .rs-footer .widget-title::after {
        content: '' !important;
        position: absolute !important;
        left: 0 !important;
        bottom: 0 !important;
        width: 32px !important;
        height: 3px !important;
        background: #d29100 !important;
        border-radius: 2px !important;
    }

    /* About Column */
    .rs-footer .footer-about-text {
        color: #cfd8dc !important;
        font-size: 14px !important;
        line-height: 1.7 !important;
        margin-bottom: 0 !important;
    }
    .rs-footer .footer-about-tagline {
        color: #ffffff !important;
        font-weight: 600 !important;
        font-size: 15px !important;
        margin-bottom: 8px !important;
    }

    /* Quick Links Modern List */
    .rs-footer .footer-links-grid {
        margin: 0 -8px;
    }
    .rs-footer .footer-links-col {
        padding: 0 8px;
    }
    .rs-footer .footer-links-list {
        list-style: none !important;
        padding: 0 !important;
        margin: 0 !important;
    }
    .rs-footer .footer-links-list li {
        padding-left: 14px !important;
        position: relative !important;
        margin-bottom: 9px !important;
        font-size: 13.5px !important;
    }
    .rs-footer .footer-links-list li::before {
        content: '\f105' !important;
        font-family: FontAwesome !important;
        position: absolute !important;
        left: 0 !important;
        top: 50% !important;
        transform: translateY(-50%) !important;
        color: #d29100 !important;
        font-size: 12px !important;
        width: auto !important;
        height: auto !important;
        background: none !important;
    }
    .rs-footer .footer-links-list li a {
        color: #cfd8dc !important;
        text-decoration: none !important;
        transition: all 0.25s ease !important;
        display: inline-block !important;
    }
    .rs-footer .footer-links-list li a:hover {
        color: #ffffff !important;
        transform: translateX(4px) !important;
    }

    /* Recent Posts Modern Cards */
    .rs-footer .footer-post-item {
        display: flex !important;
        align-items: center !important;
        margin-bottom: 14px !important;
        padding-bottom: 12px !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
    }
    .rs-footer .footer-post-item:last-child {
        border-bottom: none !important;
        margin-bottom: 0 !important;
        padding-bottom: 0 !important;
    }
    .rs-footer .footer-post-thumb {
        width: 62px !important;
        height: 52px !important;
        border-radius: 6px !important;
        overflow: hidden !important;
        flex-shrink: 0 !important;
        margin-right: 12px !important;
        background: rgba(255, 255, 255, 0.05) !important;
    }
    .rs-footer .footer-post-thumb img {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
        transition: transform 0.3s ease !important;
    }
    .rs-footer .footer-post-item:hover .footer-post-thumb img {
        transform: scale(1.08) !important;
    }
    .rs-footer .footer-post-content {
        flex-grow: 1 !important;
    }
    .rs-footer .footer-post-title {
        font-size: 13.5px !important;
        font-weight: 600 !important;
        line-height: 1.4 !important;
        margin-bottom: 3px !important;
    }
    .rs-footer .footer-post-title a {
        color: #ffffff !important;
        text-decoration: none !important;
        transition: color 0.25s !important;
    }
    .rs-footer .footer-post-title a:hover {
        color: #d29100 !important;
    }
    .rs-footer .footer-post-date {
        font-size: 12px !important;
        color: #d29100 !important;
        display: block !important;
    }
    .rs-footer .footer-post-date i {
        margin-right: 4px !important;
    }

    /* Address / Contact Modern List */
    .rs-footer .footer-contact-list {
        list-style: none !important;
        padding: 0 !important;
        margin: 0 !important;
    }
    .rs-footer .footer-contact-item {
        display: flex !important;
        align-items: flex-start !important;
        margin-bottom: 14px !important;
    }
    .rs-footer .footer-contact-item:last-child {
        margin-bottom: 0 !important;
    }
    .rs-footer .footer-contact-icon {
        width: 32px !important;
        height: 32px !important;
        line-height: 32px !important;
        border-radius: 50% !important;
        background: rgba(210, 145, 0, 0.15) !important;
        color: #d29100 !important;
        text-align: center !important;
        font-size: 13px !important;
        margin-right: 12px !important;
        flex-shrink: 0 !important;
        margin-top: 2px !important;
    }
    .rs-footer .footer-contact-text {
        color: #cfd8dc !important;
        font-size: 13.5px !important;
        line-height: 1.55 !important;
        margin: 0 !important;
    }
    .rs-footer .footer-contact-text a {
        color: #cfd8dc !important;
        text-decoration: none !important;
        transition: color 0.25s !important;
    }
    .rs-footer .footer-contact-text a:hover {
        color: #ffffff !important;
    }

    /* Footer Bottom Bar */
    .rs-footer .footer-bottom-logo img {
        max-height: 50px !important;
        width: auto !important;
        object-fit: contain !important;
    }
    .rs-footer .footer-copyright-text {
        color: #b0bec5 !important;
        font-size: 13.5px !important;
        margin: 0 !important;
    }
    .rs-footer .footer-social-icons {
        list-style: none !important;
        padding: 0 !important;
        margin: 0 !important;
        display: flex !important;
        justify-content: flex-end !important;
        gap: 8px !important;
    }
    .rs-footer .footer-social-icons a {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        width: 34px !important;
        height: 34px !important;
        border-radius: 50% !important;
        background: rgba(255, 255, 255, 0.12) !important;
        color: #ffffff !important;
        font-size: 13px !important;
        text-decoration: none !important;
        transition: all 0.25s ease !important;
    }
    .rs-footer .footer-social-icons a:hover {
        background: #d29100 !important;
        color: #ffffff !important;
        transform: translateY(-2px) !important;
    }

    @media (max-width: 991px) {
        .rs-footer .footer-top {
            padding: 45px 0 25px !important;
        }
        .rs-footer .footer-widget {
            margin-bottom: 30px !important;
        }
        .rs-footer .footer-bottom-logo,
        .rs-footer .footer-copyright-text {
            text-align: center !important;
            margin-bottom: 12px !important;
        }
        .rs-footer .footer-social-icons {
            justify-content: center !important;
        }
    }
</style>

<footer id="rs-footer" class="rs-footer">
    <!-- Top Section -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <!-- Column 1: About -->
                <div class="col-lg-3 col-md-6 col-sm-12 footer-widget">
                    <h4 class="widget-title">About</h4>
                    @if(isset($about->title))
                        <p class="footer-about-tagline">{{ $about->title }}</p>
                    @endif
                    <p class="footer-about-text">
                        {!! \Illuminate\Support\Str::limit(strip_tags($about->details1 ?? 'Dedicated to educational excellence, analytical thinking, and training students for contemporary corporate leadership.'), 140) !!}
                    </p>
                </div>

                <!-- Column 2: Quick Links (2-Column Subgrid) -->
                <div class="col-lg-3 col-md-6 col-sm-12 footer-widget">
                    <h4 class="widget-title">Quick Links</h4>
                    <div class="row footer-links-grid">
                        <div class="col-6 footer-links-col">
                            <ul class="footer-links-list">
                                <li><a href="{{ route('front.page') }}">Home</a></li>
                                <li><a href="{{ route('about.page') }}">About Us</a></li>
                                <li><a href="{{ route('objectives.page') }}">Objectives</a></li>
                                <li><a href="{{ route('director.desk') }}">Director Desk</a></li>
                                <li><a href="{{ route('our.board') }}">Our Board</a></li>
                                <li><a href="{{ route('courses') }}">Programs</a></li>
                                <li><a href="{{ route('placements.page') }}">Placements</a></li>
                            </ul>
                        </div>
                        <div class="col-6 footer-links-col">
                            <ul class="footer-links-list">
                                <li><a href="{{ route('admission.page') }}">Admission</a></li>
                                <li><a href="{{ route('result.archive') }}">Result</a></li>
                                <li><a href="{{ route('gallery.page') }}">Gallery</a></li>
                                <li><a href="{{ route('alumni.page') }}">Alumni</a></li>
                                <li><a href="{{ route('blogs.page') }}">Blogs</a></li>
                                <li><a href="{{ route('contacts') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Column 3: Recent Posts -->
                <div class="col-lg-3 col-md-6 col-sm-12 footer-widget">
                    <h4 class="widget-title">Recent Posts</h4>
                    @if(isset($blogs) && count($blogs) > 0)
                        @foreach ($blogs->take(2) as $blog)
                        <div class="footer-post-item">
                            <div class="footer-post-thumb">
                                @if($blog->main_image && file_exists(public_path($blog->main_image)))
                                    <img src="{{ asset($blog->main_image) }}" alt="{{ $blog->title }}">
                                @else
                                    <img src="{{ asset('frontend/assets/images/blog/1.jpg') }}" alt="{{ $blog->title }}">
                                @endif
                            </div>
                            <div class="footer-post-content">
                                <div class="footer-post-title">
                                    <a href="{{ route('blogs.details', $blog->id) }}" title="{{ $blog->title }}">
                                        {{ \Illuminate\Support\Str::limit($blog->title, 24) }}
                                    </a>
                                </div>
                                <span class="footer-post-date">
                                    <i class="fa fa-calendar"></i> {{ $blog->created_at->format('M d, Y') }}
                                </span>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p class="footer-about-text">No recent updates available at this moment.</p>
                    @endif
                </div>

                <!-- Column 4: Contact / Address -->
                @php
                    $link = App\Models\WebsiteLinks::latest()->first();
                @endphp
                <div class="col-lg-3 col-md-6 col-sm-12 footer-widget">
                    <h4 class="widget-title">Address</h4>
                    <ul class="footer-contact-list">
                        <li class="footer-contact-item">
                            <div class="footer-contact-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <p class="footer-contact-text">{{ $link->address ?? 'Cantonment, Dhaka 1206' }}</p>
                        </li>
                        <li class="footer-contact-item">
                            <div class="footer-contact-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <p class="footer-contact-text">
                                <a href="tel:{{ $link->number ?? '+01710908199' }}">{{ $link->number ?? '+01710908199' }}</a>
                            </p>
                        </li>
                        <li class="footer-contact-item">
                            <div class="footer-contact-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <p class="footer-contact-text">
                                <a href="mailto:{{ $link->email ?? 'info@cftm.edu' }}">{{ $link->email ?? 'info@cftm.edu' }}</a>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <!-- Logo -->
                <div class="col-lg-4 col-md-12 text-center text-lg-left mb-2 mb-lg-0">
                    @php
                        $logo = App\Models\Logo::latest()->first();
                    @endphp
                    <div class="footer-bottom-logo">
                        <a href="{{ route('front.page') }}">
                            @if(isset($logo->logo_image) && file_exists(public_path($logo->logo_image)))
                                <img src="{{ asset($logo->logo_image) }}" alt="{{ $logo->site_name ?? 'CFTM' }}">
                            @else
                                <span class="text-white font-weight-bold" style="font-size: 18px;">CFTM</span>
                            @endif
                        </a>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="col-lg-4 col-md-12 text-center mb-2 mb-lg-0">
                    <p class="footer-copyright-text">
                        {{-- &copy; {{ date('Y') }} {{ $footer->credit ?? 'All Rights Reserved.' }} --}}
                        &copy;2026 CFTM | All Rights Reserved | Developed By <a href="https://www.techwebdit.com/" target="_blank">Techweb BD IT</a>
                    </p>
                </div>

                <!-- Social Icons -->
                <div class="col-lg-4 col-md-12 text-center text-lg-right">
                    <ul class="footer-social-icons">
                        <li><a href="{{ $link->facebook ?? '#' }}" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="{{ $link->twitter ?? '#' }}" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{ $link->linkedIn ?? '#' }}" target="_blank" title="LinkedIn"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="{{ $link->youtube ?? '#' }}" target="_blank" title="YouTube"><i class="fa fa-youtube-play"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
