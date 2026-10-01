<!DOCTYPE html>
<html lang="zxx">
<head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>CFTM | Welcome to our Website.</title>
        <meta name="description" content="">
        <!-- responsive tag -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @php
        $logo=App\Models\Logo::latest()->first();
        @endphp
        <!-- favicon -->
        <link rel="apple-touch-icon" href="{{ asset($logo->favicon) }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset($logo->favicon) }}">
        @include('frontend.includes.style')
    </head>
    <body class="home-style2">
        
        <!--Preloader area start here-->
        <div id="loader" class="loader">
            <div class="loader-container">
                <div class='loader-icon'>
                    <img src="{{ asset($logo->logo_image) }}" alt="">
                </div>
            </div>
        </div>
        <!--Preloader area End here-->
        @php
        $facilities=App\Models\Facility::get();
        $blogs = App\Models\Blog::orderBy('created_at', 'desc')->get();
        $about = App\Models\About::latest()->first();

        @endphp
        <!--Full width header Start-->
       @include('frontend.includes.header')
        <!--Full width header End-->

		<!-- Main content Start -->
        <div class="main-content">

           @yield('content')
        </div>
        <!-- Main content End -->

        <!-- Footer Start -->
       @include('frontend.includes.footer')
        <!-- Footer End -->

        <!-- start scrollUp  -->
        <div id="scrollUp">
            <i class="fa fa-angle-up"></i>
        </div>
        <!-- End scrollUp  -->

        <!-- Search Modal Start -->
        <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span class="flaticon-cross"></span>
            </button>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="search-block clearfix">
                        <form>
                            <div class="form-group">
                                <input class="form-control" placeholder="Search Here..." type="text">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Modal End -->

        @include('frontend.includes.script')
    </body>

<!-- Mirrored from keenitsolutions.com/products/html/educavo/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Mar 2024 05:44:33 GMT -->
</html>
