@php
    $link = App\Models\WebsiteLinks::latest()->first();
    $logo = App\Models\Logo::latest()->first();
    $navCategories = isset($categories) && count($categories) > 0 ? $categories : App\Models\Category::with('subCategories')->where('status', 1)->get();
    $navProgramCategories = App\Models\ProgramCategory::with(['programs' => function($q) {
        $q->where('status', 1)->orderBy('order_num', 'asc');
    }])->where('status', 1)->orderBy('order_num', 'asc')->get();
    $navFacilities = isset($facilities) && count($facilities) > 0 ? $facilities : App\Models\Facility::latest()->get();
@endphp

<style>
    /* KCCMS Inspired Header Styling */
    .kccms-topbar {
        background-color: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
        padding: 7px 0;
        font-size: 13px;
        color: #555555;
        font-family: 'Poppins', sans-serif;
    }
    .kccms-topbar a {
        color: #555555;
        text-decoration: none;
        transition: color 0.3s;
    }
    .kccms-topbar a:hover {
        color: #d29100;
    }
    .kccms-topbar-contact span {
        font-weight: 600;
        color: #202020;
    }
    .kccms-topbar-social a {
        display: inline-block;
        margin: 0 5px;
        color: #777;
        font-size: 14px;
        transition: color 0.3s;
    }
    .kccms-topbar-social a:hover {
        color: #d29100;
    }
    .kccms-topbar-btn {
        background-color: #d29100;
        color: #ffffff !important;
        font-weight: 600;
        padding: 4px 14px;
        border-radius: 4px;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-left: 12px;
        display: inline-block;
        transition: background 0.3s;
    }
    .kccms-topbar-btn:hover {
        background-color: #b57c00;
        color: #ffffff !important;
    }

    /* Main Navbar */
    .kccms-navbar {
        background-color: #ffffff;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.06);
        position: sticky;
        top: 0;
        z-index: 999;
        transition: all 0.3s ease;
    }
    .kccms-nav-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 8px 15px;
    }
    .kccms-logo img {
        max-height: 65px;
        width: auto;
        object-fit: contain;
    }

    /* Desktop Navigation List */
    .kccms-nav-menu {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
        align-items: center;
        flex-wrap: wrap;
    }
    .kccms-nav-item {
        position: relative;
    }
    .kccms-nav-link {
        display: block;
        padding: 18px 11px;
        font-size: 14px;
        font-weight: 600;
        color: #202020;
        font-family: 'Poppins', sans-serif;
        text-decoration: none;
        border-bottom: 3px solid transparent;
        transition: all 0.25s ease;
        white-space: nowrap;
    }
    .kccms-nav-link:hover,
    .kccms-nav-item:hover > .kccms-nav-link,
    .kccms-nav-item.active > .kccms-nav-link {
        color: #d29100;
        border-bottom: 3px solid #d29100;
    }
    .kccms-nav-link i.dropdown-icon {
        font-size: 11px;
        margin-left: 4px;
        transition: transform 0.2s;
    }
    .kccms-nav-item:hover > .kccms-nav-link i.dropdown-icon {
        transform: rotate(180deg);
    }

    /* Dropdown Menus */
    .kccms-dropdown {
        position: absolute;
        top: 100%;
        left: 0;
        background: #ffffff;
        min-width: 220px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: 1px solid #ebebeb;
        border-top: 3px solid #d29100;
        border-radius: 0 0 6px 6px;
        list-style: none;
        padding: 6px 0;
        margin: 0;
        display: none;
        z-index: 1000;
        animation: kccmsFadeIn 0.25s ease forwards;
    }
    @keyframes kccmsFadeIn {
        from { opacity: 0; transform: translateY(8px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .kccms-nav-item:hover > .kccms-dropdown {
        display: block;
    }
    .kccms-dropdown-item {
        position: relative;
        border-bottom: 1px solid #f4f4f4;
    }
    .kccms-dropdown-item:last-child {
        border-bottom: none;
    }
    .kccms-dropdown-link {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 9px 18px;
        font-size: 13px;
        font-weight: 500;
        color: #333333;
        font-family: 'Poppins', sans-serif;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    .kccms-dropdown-link:hover {
        background-color: #fbfbfb;
        color: #d29100;
        padding-left: 22px;
    }

    /* Nested Submenu (Right flyout) */
    .kccms-sub-dropdown {
        position: absolute;
        top: 0;
        left: 100%;
        background: #ffffff;
        min-width: 210px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: 1px solid #ebebeb;
        border-top: 3px solid #d29100;
        border-radius: 4px;
        list-style: none;
        padding: 6px 0;
        margin: 0;
        display: none;
        z-index: 1001;
    }
    .kccms-dropdown-item:hover > .kccms-sub-dropdown {
        display: block;
    }

    /* Mobile Hamburger & Drawer */
    .kccms-mobile-toggle {
        display: none;
        background: transparent;
        border: none;
        font-size: 24px;
        color: #202020;
        cursor: pointer;
        padding: 8px;
    }
    .kccms-mobile-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.6);
        z-index: 9998;
        display: none;
    }
    .kccms-mobile-drawer {
        position: fixed;
        top: 0;
        right: -320px;
        width: 300px;
        height: 100vh;
        background: #ffffff;
        z-index: 9999;
        overflow-y: auto;
        box-shadow: -5px 0 25px rgba(0,0,0,0.15);
        transition: right 0.35s ease;
        padding: 20px;
    }
    .kccms-mobile-drawer.open {
        right: 0;
    }
    .kccms-drawer-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
        margin-bottom: 15px;
    }
    .kccms-drawer-close {
        background: transparent;
        border: none;
        font-size: 22px;
        color: #333;
        cursor: pointer;
    }
    .kccms-mobile-menu-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .kccms-mobile-menu-list li {
        border-bottom: 1px solid #f0f0f0;
    }
    .kccms-mobile-menu-list a {
        display: block;
        padding: 12px 5px;
        font-size: 14px;
        font-weight: 600;
        color: #202020;
        text-decoration: none;
    }
    .kccms-mobile-menu-list a:hover {
        color: #d29100;
    }
    .kccms-mobile-submenu {
        list-style: none;
        padding-left: 15px;
        margin: 0;
        display: none;
        background-color: #fafafa;
    }
    .kccms-mobile-submenu a {
        font-size: 13px;
        font-weight: 400;
        color: #555;
        padding: 8px 10px;
    }

    @media (max-width: 1200px) {
        .kccms-nav-menu {
            display: none;
        }
        .kccms-mobile-toggle {
            display: block;
        }
    }
</style>

<!-- Topbar Area Start (kccms.org style) -->
<div class="kccms-topbar d-none d-md-block">
    <div class="container-fluid px-lg-5">
        <div class="row align-items-center justify-content-between">
            <div class="col-auto">
                <span class="mr-3">
                    <span class="font-weight-bold text-dark"><i class="fa fa-phone kccms-gold-accent mr-1"></i> Call Us:</span>
                    <a href="tel:{{ $link->number ?? '+917208548180' }}">{{ $link->number ?? '+91 72085 48180' }}</a>
                </span>
                <span>
                    <span class="font-weight-bold text-dark"><i class="fa fa-envelope kccms-gold-accent mr-1"></i> Email:</span>
                    <a href="mailto:{{ $link->email ?? 'info@cftm.edu' }}">{{ $link->email ?? 'info@cftm.edu' }}</a>
                </span>
            </div>
            <div class="col-auto d-flex align-items-center">
                <div class="kccms-topbar-social mr-3">
                    <a href="{{ $link->facebook ?? '#' }}" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>
                    <a href="{{ $link->linkedIn ?? '#' }}" target="_blank" title="LinkedIn"><i class="fa fa-linkedin"></i></a>
                    <a href="{{ $link->youtube ?? '#' }}" target="_blank" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                </div>
                <div class="kccms-topbar-auth">
                    @auth
                        <a href="{{ route('home') }}" class="font-weight-bold text-dark"><i class="fa fa-user-circle mr-1"></i> Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"><i class="fa fa-sign-in mr-1"></i> Login</a>
                        <span class="mx-1 text-muted">/</span>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                    <a href="{{ route('admission.page') }}" class="kccms-topbar-btn">Apply Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Topbar Area End -->

<!-- Main Sticky Navbar Start -->
<nav class="kccms-navbar">
    <div class="container-fluid px-lg-5 kccms-nav-container">
        <!-- Logo -->
        <div class="kccms-logo">
            <a href="{{ route('front.page') }}">
                @if(isset($logo->logo_image) && file_exists(public_path($logo->logo_image)))
                    <img src="{{ asset($logo->logo_image) }}" alt="{{ $logo->site_name ?? 'CFTM' }}">
                @else
                    <span class="font-weight-bold text-dark" style="font-size: 24px; font-family: 'Poppins', sans-serif;">
                        CFTM <span style="color: #d29100;">INSTITUTE</span>
                    </span>
                @endif
            </a>
        </div>

        <!-- Desktop Navigation Items -->
        <ul class="kccms-nav-menu">
            <!-- Home -->
            <li class="kccms-nav-item {{ request()->routeIs('front.page') ? 'active' : '' }}">
                <a href="{{ route('front.page') }}" class="kccms-nav-link">Home</a>
            </li>

            <!-- About Us (Dropdown) -->
            <li class="kccms-nav-item {{ request()->is('about*') || request()->is('objectives*') || request()->is('director-desk') || request()->is('our-board') || request()->is('mission*') ? 'active' : '' }}">
                <a href="{{ route('about.page') }}" class="kccms-nav-link">
                    About Us <i class="fa fa-angle-down dropdown-icon"></i>
                </a>
                <ul class="kccms-dropdown">
                    <li class="kccms-dropdown-item"><a href="{{ route('about.page') }}" class="kccms-dropdown-link">About CFTM</a></li>
                    <li class="kccms-dropdown-item"><a href="{{ route('objectives.page') }}" class="kccms-dropdown-link">Objectives & Achievements</a></li>
                    <li class="kccms-dropdown-item"><a href="{{ route('director.desk') }}" class="kccms-dropdown-link">Director's Desk</a></li>
                    <li class="kccms-dropdown-item"><a href="{{ route('our.board') }}" class="kccms-dropdown-link">Our Board</a></li>
                    <li class="kccms-dropdown-item"><a href="{{ route('mission.page') }}" class="kccms-dropdown-link">Mission & Vision</a></li>
                </ul>
            </li>

            <!-- Academic Programs (Dropdown) -->
            <li class="kccms-nav-item {{ request()->is('program*') || request()->is('course*') || request()->is('all-courses') ? 'active' : '' }}">
                <a href="{{ route('programs.page') }}" class="kccms-nav-link">
                    Programs <i class="fa fa-angle-down dropdown-icon"></i>
                </a>
                <ul class="kccms-dropdown">
                    @forelse ($navProgramCategories as $pCategory)
                    <li class="kccms-dropdown-item">
                        <a href="{{ route('program.category', $pCategory->slug ?? $pCategory->id) }}" class="kccms-dropdown-link">
                            {{ $pCategory->name }}
                            @if(isset($pCategory->programs) && count($pCategory->programs) > 0)
                                <i class="fa fa-angle-right" style="font-size: 11px;"></i>
                            @endif
                        </a>
                        @if(isset($pCategory->programs) && count($pCategory->programs) > 0)
                        <ul class="kccms-sub-dropdown">
                            @foreach ($pCategory->programs as $pItem)
                            <li class="kccms-dropdown-item">
                                <a href="{{ route('program.details', $pItem->slug ?? $pItem->id) }}" class="kccms-dropdown-link">
                                    {{ $pItem->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @empty
                        @foreach ($navCategories as $category)
                        <li class="kccms-dropdown-item">
                            <a href="{{ route('course-category', ['id' => $category->id]) }}" class="kccms-dropdown-link">
                                {{ $category->name }}
                            </a>
                        </li>
                        @endforeach
                    @endforelse
                    <li class="kccms-dropdown-item">
                        <a href="{{ route('programs.page') }}" class="kccms-dropdown-link font-weight-bold" style="color: #d29100;">
                            Explore All Programs
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Placements [NEW] -->
            <li class="kccms-nav-item {{ request()->routeIs('placements.page') ? 'active' : '' }}">
                <a href="{{ route('placements.page') }}" class="kccms-nav-link">Placements</a>
            </li>

            <!-- Faculty -->
            <li class="kccms-nav-item {{ request()->is('team-page*') ? 'active' : '' }}">
                <a href="#" class="kccms-nav-link">
                    Faculty <i class="fa fa-angle-down dropdown-icon"></i>
                </a>
                <ul class="kccms-dropdown">
                    @foreach ($navCategories as $cat)
                    <li class="kccms-dropdown-item">
                        <a href="{{ route('team.page', $cat->id) }}" class="kccms-dropdown-link">
                            {{ $cat->name }} Faculty
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>

            <!-- Facility -->
            @if(count($navFacilities) > 0)
            <li class="kccms-nav-item {{ request()->is('facility*') ? 'active' : '' }}">
                <a href="#" class="kccms-nav-link">
                    Facility <i class="fa fa-angle-down dropdown-icon"></i>
                </a>
                <ul class="kccms-dropdown">
                    @foreach ($navFacilities as $facility)
                    <li class="kccms-dropdown-item">
                        <a href="{{ route('facility.details', $facility->id) }}" class="kccms-dropdown-link">
                            {{ $facility->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endif

            <!-- Admissions -->
            <li class="kccms-nav-item {{ request()->routeIs('admission.page') ? 'active' : '' }}">
                <a href="{{ route('admission.page') }}" class="kccms-nav-link">Admissions</a>
            </li>

            <!-- Result Archive -->
            <li class="kccms-nav-item {{ request()->is('result*') ? 'active' : '' }}">
                <a href="{{ route('result.archive') }}" class="kccms-nav-link">Result</a>
            </li>

            <!-- Gallery (Photo & Video) -->
            <li class="kccms-nav-item {{ request()->is('gallery*') || request()->is('video-gallery*') ? 'active' : '' }}">
                <a href="{{ route('gallery.page') }}" class="kccms-nav-link">
                    Gallery <i class="fa fa-angle-down dropdown-icon"></i>
                </a>
                <ul class="kccms-dropdown">
                    <li class="kccms-dropdown-item"><a href="{{ route('gallery.page') }}" class="kccms-dropdown-link">Photo Gallery</a></li>
                    <li class="kccms-dropdown-item"><a href="{{ route('video.gallery.page') }}" class="kccms-dropdown-link">Video Gallery</a></li>
                </ul>
            </li>

            <!-- Alumni [NEW] -->
            <li class="kccms-nav-item {{ request()->routeIs('alumni.page') ? 'active' : '' }}">
                <a href="{{ route('alumni.page') }}" class="kccms-nav-link">Alumni</a>
            </li>

            <!-- Career -->
            <li class="kccms-nav-item {{ request()->routeIs('career.page') ? 'active' : '' }}">
                <a href="{{ route('career.page') }}" class="kccms-nav-link">Career</a>
            </li>

            <!-- Blogs -->
            <li class="kccms-nav-item {{ request()->is('blogs*') ? 'active' : '' }}">
                <a href="{{ route('blogs.page') }}" class="kccms-nav-link">Blogs</a>
            </li>

            <!-- Contact -->
            <li class="kccms-nav-item {{ request()->routeIs('contacts') ? 'active' : '' }}">
                <a href="{{ route('contacts') }}" class="kccms-nav-link">Contact</a>
            </li>
        </ul>

        <!-- Mobile Hamburger Toggle -->
        <button class="kccms-mobile-toggle" id="kccmsMobileToggle" aria-label="Toggle Navigation">
            <i class="fa fa-bars"></i>
        </button>
    </div>
</nav>
<!-- Main Sticky Navbar End -->

<!-- Mobile Drawer & Overlay Start -->
<div class="kccms-mobile-overlay" id="kccmsMobileOverlay"></div>
<div class="kccms-mobile-drawer" id="kccmsMobileDrawer">
    <div class="kccms-drawer-header">
        <span class="font-weight-bold text-dark" style="font-size: 18px;">Navigation Menu</span>
        <button class="kccms-drawer-close" id="kccmsDrawerClose">&times;</button>
    </div>
    <ul class="kccms-mobile-menu-list">
        <li><a href="{{ route('front.page') }}">Home</a></li>
        
        <!-- About Us Dropdown Mobile -->
        <li>
            <a href="javascript:void(0);" class="kccms-mobile-toggle-sub d-flex justify-content-between align-items-center">
                About Us <i class="fa fa-chevron-down"></i>
            </a>
            <ul class="kccms-mobile-submenu">
                <li><a href="{{ route('about.page') }}">About CFTM</a></li>
                <li><a href="{{ route('objectives.page') }}">Objectives & Achievements</a></li>
                <li><a href="{{ route('director.desk') }}">Director's Desk</a></li>
                <li><a href="{{ route('our.board') }}">Our Board</a></li>
                <li><a href="{{ route('mission.page') }}">Mission & Vision</a></li>
            </ul>
        </li>

        <!-- Programs Dropdown Mobile -->
        <li>
            <a href="javascript:void(0);" class="kccms-mobile-toggle-sub d-flex justify-content-between align-items-center">
                Programs <i class="fa fa-chevron-down"></i>
            </a>
            <ul class="kccms-mobile-submenu">
                @forelse ($navProgramCategories as $pCategory)
                <li><a href="{{ route('program.category', $pCategory->slug ?? $pCategory->id) }}">{{ $pCategory->name }}</a></li>
                @empty
                    @foreach ($navCategories as $category)
                    <li><a href="{{ route('course-category', ['id' => $category->id]) }}">{{ $category->name }}</a></li>
                    @endforeach
                @endforelse
                <li><a href="{{ route('programs.page') }}" style="color: #d29100; font-weight: 600;">Explore All Programs</a></li>
            </ul>
        </li>

        <li><a href="{{ route('placements.page') }}">Placements</a></li>

        <!-- Faculty Dropdown Mobile -->
        <li>
            <a href="javascript:void(0);" class="kccms-mobile-toggle-sub d-flex justify-content-between align-items-center">
                Faculty <i class="fa fa-chevron-down"></i>
            </a>
            <ul class="kccms-mobile-submenu">
                @foreach ($navCategories as $cat)
                <li><a href="{{ route('team.page', $cat->id) }}">{{ $cat->name }}</a></li>
                @endforeach
            </ul>
        </li>

        <!-- Facility Dropdown Mobile -->
        @if(count($navFacilities) > 0)
        <li>
            <a href="javascript:void(0);" class="kccms-mobile-toggle-sub d-flex justify-content-between align-items-center">
                Facility <i class="fa fa-chevron-down"></i>
            </a>
            <ul class="kccms-mobile-submenu">
                @foreach ($navFacilities as $facility)
                <li><a href="{{ route('facility.details', $facility->id) }}">{{ $facility->name }}</a></li>
                @endforeach
            </ul>
        </li>
        @endif

        <li><a href="{{ route('admission.page') }}">Admissions</a></li>
        <li><a href="{{ route('result.archive') }}">Result Archive</a></li>
        
        <!-- Gallery Dropdown Mobile -->
        <li>
            <a href="javascript:void(0);" class="kccms-mobile-toggle-sub d-flex justify-content-between align-items-center">
                Gallery <i class="fa fa-chevron-down"></i>
            </a>
            <ul class="kccms-mobile-submenu">
                <li><a href="{{ route('gallery.page') }}">Photo Gallery</a></li>
                <li><a href="{{ route('video.gallery.page') }}">Video Gallery</a></li>
            </ul>
        </li>

        <li><a href="{{ route('alumni.page') }}">Alumni</a></li>
        <li><a href="{{ route('career.page') }}">Career</a></li>
        <li><a href="{{ route('blogs.page') }}">Blogs</a></li>
        <li><a href="{{ route('contacts') }}">Contact Us</a></li>
    </ul>

    <div class="mt-4 pt-3 border-top">
        <a href="{{ route('admission.page') }}" class="kccms-btn-gold btn-block text-center" style="padding: 10px;">Apply Now</a>
        <div class="mt-3 text-muted text-center" style="font-size: 13px;">
            <p class="mb-1"><i class="fa fa-phone kccms-gold-accent mr-1"></i> {{ $link->number ?? '+91 72085 48180' }}</p>
            <p class="mb-0"><i class="fa fa-envelope kccms-gold-accent mr-1"></i> {{ $link->email ?? 'info@cftm.edu' }}</p>
        </div>
    </div>
</div>
<!-- Mobile Drawer & Overlay End -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var mobileToggle = document.getElementById('kccmsMobileToggle');
        var mobileDrawer = document.getElementById('kccmsMobileDrawer');
        var mobileOverlay = document.getElementById('kccmsMobileOverlay');
        var drawerClose = document.getElementById('kccmsDrawerClose');

        function openDrawer() {
            if (mobileDrawer) mobileDrawer.classList.add('open');
            if (mobileOverlay) mobileOverlay.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        function closeDrawer() {
            if (mobileDrawer) mobileDrawer.classList.remove('open');
            if (mobileOverlay) mobileOverlay.style.display = 'none';
            document.body.style.overflow = '';
        }

        if (mobileToggle) mobileToggle.addEventListener('click', openDrawer);
        if (drawerClose) drawerClose.addEventListener('click', closeDrawer);
        if (mobileOverlay) mobileOverlay.addEventListener('click', closeDrawer);

        // Mobile submenu accordion
        var subToggles = document.querySelectorAll('.kccms-mobile-toggle-sub');
        subToggles.forEach(function (btn) {
            btn.addEventListener('click', function () {
                var submenu = this.nextElementSibling;
                var icon = this.querySelector('i');
                if (submenu.style.display === 'block') {
                    submenu.style.display = 'none';
                    if (icon) icon.className = 'fa fa-chevron-down';
                } else {
                    submenu.style.display = 'block';
                    if (icon) icon.className = 'fa fa-chevron-up';
                }
            });
        });
    });
</script>
