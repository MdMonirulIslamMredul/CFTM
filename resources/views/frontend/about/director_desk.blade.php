@extends('frontend.master')

@section('title')
    Director's Desk | Leadership Message
@endsection

@section('content')
<style>
    .kccms-page-header {
        background: linear-gradient(135deg, #153339 0%, #1e454d 100%);
        padding: 60px 0;
        color: #ffffff;
        position: relative;
    }
    .kccms-page-header h1 {
        color: #ffffff;
        font-size: 38px;
        font-weight: 700;
        margin-bottom: 10px;
        font-family: 'Poppins', sans-serif;
    }
    .kccms-breadcrumbs {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        font-size: 14px;
    }
    .kccms-breadcrumbs li {
        color: rgba(255, 255, 255, 0.7);
    }
    .kccms-breadcrumbs li a {
        color: #d29100;
        text-decoration: none;
        transition: color 0.3s;
    }
    .kccms-breadcrumbs li a:hover {
        color: #ffffff;
    }
    .kccms-breadcrumbs li + li:before {
        content: "/";
        padding: 0 10px;
        color: rgba(255, 255, 255, 0.5);
    }
    .kccms-gold-accent {
        color: #d29100;
    }
    .director-card {
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 5px 25px rgba(0,0,0,0.07);
        padding: 30px;
        border-top: 4px solid #d29100;
        position: sticky;
        top: 100px;
    }
    .director-img-wrapper {
        border-radius: 6px;
        overflow: hidden;
        margin-bottom: 20px;
        background-color: #f0f4f5;
        height: 320px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .director-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .director-quote {
        background: #fdfaf3;
        border-left: 4px solid #d29100;
        padding: 25px;
        border-radius: 0 8px 8px 0;
        font-style: italic;
        margin: 25px 0;
        font-size: 17px;
        color: #333333;
        line-height: 1.7;
    }
    .pillar-box {
        background: #ffffff;
        padding: 22px;
        border-radius: 6px;
        border: 1px solid #edf2f4;
        margin-bottom: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.03);
    }
</style>

<!-- Page Header Start -->
<div class="kccms-page-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1>Director's Desk</h1>
                <ul class="kccms-breadcrumbs">
                    <li><a href="{{ route('front.page') }}">Home</a></li>
                    <li><a href="{{ route('about.page') }}">About Us</a></li>
                    <li>Director's Desk</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Main Content Start -->
<div class="py-5">
    <div class="container">
        <div class="row">
            <!-- Left Column: Director Profile Card -->
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="director-card text-center">
                    <div class="director-img-wrapper">
                        @if(isset($about->banner_image) && file_exists(public_path($about->banner_image)))
                            <img src="{{ asset($about->banner_image) }}" alt="Director">
                        @else
                            <div class="text-center p-4">
                                <i class="fa fa-user-circle-o fa-5x text-muted mb-3"></i>
                                <p class="text-muted mb-0 font-weight-bold">Office of the Director</p>
                            </div>
                        @endif
                    </div>
                    <h4 class="font-weight-bold text-dark mb-1" style="font-family: 'Poppins', sans-serif;">Dr. Leadership Message</h4>
                    <span class="text-uppercase font-weight-bold kccms-gold-accent" style="font-size: 13px; letter-spacing: 0.5px;">Director & Academic Dean</span>
                    <hr class="my-3">
                    <p class="text-muted text-left mb-2" style="font-size: 14px;">
                        <i class="fa fa-envelope kccms-gold-accent mr-2"></i> {{ $link->email ?? 'director@cftm.edu' }}
                    </p>
                    <p class="text-muted text-left mb-0" style="font-size: 14px;">
                        <i class="fa fa-phone kccms-gold-accent mr-2"></i> {{ $link->number ?? '+91 72085 48180' }}
                    </p>
                </div>
            </div>

            <!-- Right Column: Director's Note -->
            <div class="col-lg-8 pl-lg-4">
                <span class="text-uppercase font-weight-bold kccms-gold-accent" style="letter-spacing: 1px;">Welcome to Our Academy</span>
                <h2 class="font-weight-bold text-dark mt-2 mb-4" style="font-family: 'Poppins', sans-serif;">Empowering Minds, Shaping Tomorrow's Leaders</h2>

                <p class="text-muted leading-relaxed" style="font-size: 16px; line-height: 1.85;">
                    It gives me immense pleasure to welcome you to our prestigious institution. Since our foundation, our commitment has been unwavering: to provide a vibrant academic sanctuary where intellectual inquiry flourishes, industry excellence is forged, and ethical character is deeply cultivated.
                </p>

                <div class="director-quote">
                    "True education transcends textbooks and lectures; it is about awakening the potential within every student, fostering resilient problem-solvers who lead with vision, empathy, and integrity."
                </div>

                <p class="text-muted leading-relaxed" style="font-size: 15px; line-height: 1.85;">
                    In an era characterized by dynamic global shifts, technological acceleration, and evolving market demands, our academic curriculum and hands-on pedagogies are meticulously curated to equip students not merely for their first employment, but for enduring, purpose-driven careers.
                </p>

                <h4 class="font-weight-bold text-dark mt-4 mb-3" style="font-family: 'Poppins', sans-serif;">Our Core Institutional Pillars</h4>

                <div class="row">
                    <div class="col-md-6">
                        <div class="pillar-box">
                            <h5 class="font-weight-bold text-dark"><i class="fa fa-graduation-cap kccms-gold-accent mr-2"></i> Academic Rigor</h5>
                            <p class="text-muted mb-0" style="font-size: 14px;">Imparting depth of technical and conceptual mastery through contemporary case studies and real-world project modules.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pillar-box">
                            <h5 class="font-weight-bold text-dark"><i class="fa fa-handshake-o kccms-gold-accent mr-2"></i> Corporate Immersion</h5>
                            <p class="text-muted mb-0" style="font-size: 14px;">Direct exposure to industry stalwarts, executive masterclasses, and corporate mentorship ecosystems.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pillar-box">
                            <h5 class="font-weight-bold text-dark"><i class="fa fa-lightbulb-o kccms-gold-accent mr-2"></i> Innovation & Research</h5>
                            <p class="text-muted mb-0" style="font-size: 14px;">Encouraging creative inquiry, entrepreneurial venture incubation, and multi-disciplinary critical thinking.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pillar-box">
                            <h5 class="font-weight-bold text-dark"><i class="fa fa-globe kccms-gold-accent mr-2"></i> Global Consciousness</h5>
                            <p class="text-muted mb-0" style="font-size: 14px;">Instilling ethical responsibility, cross-cultural competence, and sustainable social impact mindset.</p>
                        </div>
                    </div>
                </div>

                <p class="text-muted leading-relaxed mt-3" style="font-size: 15px; line-height: 1.85;">
                    I invite every aspiring learner, parent, and corporate partner to embark on this transformative voyage with us, as we continually redefine benchmarks of educational excellence.
                </p>

                <div class="mt-4 pt-2">
                    <h5 class="font-weight-bold text-dark mb-0">With Warm Regards,</h5>
                    <p class="kccms-gold-accent font-weight-bold mb-0">Director & Academic Leadership</p>
                    <span class="text-muted" style="font-size: 14px;">CFTM Institute of Management & Studies</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Content End -->

@endsection
