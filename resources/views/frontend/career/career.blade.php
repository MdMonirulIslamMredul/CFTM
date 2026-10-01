@extends('frontend.master')
@section('title')
    Packages
@endsection
@section('content')

    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src="{{ asset('/') }}frontend/assets/images/breadcrumbs/6.jpg" alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color padding">
            <h1 class="page-title">Career Section</h1>
            <ul>
                <li>
                    <a class="active" href="index.html">Home</a>
                </li>
                <li>Career</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->            

   <!-- Contact Section Start -->
   <div class="contact-page-section pt-100 pb-100 md-pt-70 md-pb-70">
    <div class="container">
        <div class="row align-items-center">
           
            <div class="col-lg-12 pl-60 md-pl-15">
                <div class="contact-comment-box">
                    <div class="inner-part">
                        <h2 class="title mb-mb-15">Submit Your Career Application</h2>
                        <p>Interested in joining our team? Please fill out the form below to submit your career application.</p>
                    </div>
                    <div id="form-messages"></div>
                    <form method="post" action="{{ route('career.submit') }}" enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                            <div class="row">
                                <div class="col-lg-6 mb-35 col-md-6 col-sm-6">
                                    <input class="from-control" type="text" id="name" name="name" placeholder="Your Name" required="">
                                </div> 
                                <div class="col-lg-6 mb-35 col-md-6 col-sm-6">
                                    <input class="from-control" type="email" id="email" name="email" placeholder="Your Email" required="">
                                </div>   
                                <div class="col-lg-6 mb-35 col-md-6 col-sm-6">
                                    <input class="from-control" type="tel" id="phone" name="phone" placeholder="Your Phone" required="">
                                </div>   
                                <div class="col-lg-6 mb-35 col-md-6 col-sm-6">
                                    <input class="from-control" type="text" id="position" name="position" placeholder="Position Applying For" required="">
                                </div>
                                <div class="col-lg-6 mb-35 col-md-6 col-sm-6">
                                    <input class="from-control" type="file" id="cv" name="cv" accept=".pdf,.doc,.docx" required="">
                                    <small class="form-text text-muted">Accepted file formats: PDF, DOC, DOCX</small>
                                </div>
                                <div class="col-lg-12 mb-50">
                                    <textarea class="from-control" id="message" name="message" placeholder="Your Message (Optional)"></textarea>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <input class="btn-send" type="submit" value="Submit Application">
                            </div>										   
                        </fieldset>
                    </form>
                </div>
            </div>
            
            
        </div>
        <div class="row rs-contact-box mt-90 md-mb-50">
            <div class="col-lg-4 col-md-12-4 lg-pl-0 sm-mb-30 md-mb-30">
                <div class="address-item">
                    <div class="icon-part">
                        <img src="{{ asset('/') }}frontend/assets/images/contact/icon/1.png" alt="">
                    </div>
                    <div class="address-text">
                        <span class="label">Address</span>
                    <span class="des">{{ $link->address }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 lg-pl-0 sm-mb-30 md-mb-30">
                <div class="address-item">
                    <div class="icon-part">
                        <img src="{{ asset('/') }}frontend/assets/images/contact/icon/2.png" alt="">
                    </div>
                    <div class="address-text">
                        <span class="label">Email Address</span>
                        <span class="des"><a href="mailto:info@rstheme.com">{{ $link->email }}</a></span>
                    </div>
                </div>
            </div> 
            <div class="col-lg-4 col-md-12 lg-pl-0 sm-mb-30">
                <div class="address-item">
                    <div class="icon-part">
                        <img src="{{ asset('/') }}frontend/assets/images/contact/icon/3.png" alt="">
                    </div>
                    <div class="address-text">
                        <span class="label">Phone Number</span>
                        <span class="des"><a href="tel+0885898745">{{ $link->number }}</a></span>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</div>
<!-- Contact Section End -->   

@endsection
