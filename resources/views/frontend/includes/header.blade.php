<div class="full-width-header header-style2">
    <!--Header Start-->
    <header id="rs-header" class="rs-header">
        <!-- Topbar Area Start -->
        <div class="topbar-area">
            <div class="container">
                <div class="row y-middle">
                    <div class="col-md-7">
                        <ul class="topbar-contact">
                            @php
                                    $link=App\Models\WebsiteLinks::latest()->first();
                                @endphp
                            <li>
                                <i class="flaticon-email"></i>
                                <a href="mailto:support@rstheme.com">{{ $link->email }}</a>
                            </li>
                            <li>
                                <i class="flaticon-call"></i>
                                <a href="tel:+088589-8745">{{ $link->number }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-5 text-right">
                        <ul class="topbar-right">
                            <li class="login-register">
                                <i class="fa fa-sign-in"></i>
                                <a href="{{ route('login') }}">Login</a>/<a href="{{ route('register') }}">Register</a>
                            </li>
                            <li class="btn-part">
                                <a class="apply-btn" href="#">Apply Now</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar Area End -->

        <!-- Menu Start -->
        <div class="menu-area menu-sticky">
            <div class="container-fluid">
                <div class="row y-middle">
                    <div class="col-lg-2">
                        <div class="logo-cat-wrap">
                            <div class="logo-part pr-90">
                                @php
                                    $logo=App\Models\Logo::latest()->first();
                                @endphp
                                <a class="dark-logo" href="{{ route('front.page') }}">
                                    <img src="{{ asset($logo->logo_image) }}" alt=""  style="max-height: 96px;">
                                </a>
                                <a class="light-logo" href="{{ route('front.page') }}">
                                    <img src="{{ asset($logo->logo_image) }}" alt="" style="max-height: 96px;">
                                </a>
                            </div>
                            {{-- <div class="categories-btn">
                               <button type="button" class="cat-btn"><i class="fa fa-th"></i>Categories</button>
                                <div class="cat-menu-inner">
                                    <ul id="cat-menu">
                                        <li><a href="{{ asset('/') }}frontend/#">Category 1</a></li>
                                        <li><a href="{{ asset('/') }}frontend/#">Category 2</a></li>
                                        <li><a href="{{ asset('/') }}frontend/#">Category 3</a></li>
                                        <li><a href="{{ asset('/') }}frontend/#">Category 4</a></li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-10 text-center">
                        <div class="rs-menu-area">
                            <div class="main-menu pr-90">
                                <div class="mobile-menu">
                                    <a class="rs-menu-toggle">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </div>
                                <nav class="rs-menu">
                                   <ul class="nav-menu">
                                      <li class="menu-item"> <a href="{{ route('front.page') }}">Home</a>
                                         
                                      </li>
                                      
                                      <li class="menu-item-has-children">
                                        <a href="">Facility</a>
                                        <ul class="sub-menu">
                                         @foreach ($facilities as $facility)
                                            <li><a href="{{ route('facility.details',$facility->id) }}">{{ $facility->name }}</a> </li>
                                            @endforeach
                                            
                                        </ul>
                                    </li>
                                       <li class="menu-item-has-children">
                                           <a href="">Faculty</a>
                                           <ul class="sub-menu">
                                            @foreach ($categories as $category)
                                               <li><a href="{{ route('team.page',$category->id) }}">{{ $category->name }}</a> </li>
                                               @endforeach
                                               
                                           </ul>
                                       </li>
                                       
                                       <li class="menu-item-has-children">
                                        <a href="{{ asset('/') }}frontend/#">Academic Programs</a>
                                        <ul class="sub-menu">
                                                @foreach ($categories as $category)
                                                <li class="menu-item-has-children right">
                                                    <a href="{{ route('course-category',['id' =>$category->id]) }}">{{ $category->name??null }}</a>
                                                    <ul class="sub-menu right">

                                                            @foreach ($category->subCategories as $subCategory)
                                                            <li><a href="{{route('course-sub-category',['id'=> $subCategory->id])}}">{{ $subCategory->name }}</a></li>
                                                            @endforeach

                                                    </ul>
                                                </li>
                                                @endforeach


                                        </ul>
                                    </li>

                                       <li class="menu-item">
                                           <a href="{{ route('admission.page') }}">Admission</a>
                                       </li>

                                       <li class="menu-item">
                                           <a href="{{ route('result.page') }}">Result</a>
                                       </li>
                                       <li class="menu-item-has-children">
                                        <a href="">About</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('about.page') }}">About Us</a> </li>
                                            <li><a href="{{ route('mission.page') }}">Mission & Vision</a> </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('career.page') }}">Career</a>
                                        
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('blogs.page') }}">Blogs</a>
                                        {{-- <ul class="sub-menu">
                                            <li><a href="{{ asset('/') }}frontend/course.html">Courses One</a> </li>
                                            
                                        </ul> --}}
                                    </li>
                                       <li class="menu-item">
                                           <a href="{{ route('contacts') }}">Contact</a>
                                           {{-- <ul class="sub-menu">
                                              <li><a href="{{ asset('/') }}frontend/contact.html">Contact One</a> </li>
                                              <li><a href="{{ asset('/') }}frontend/contact2.html">Contact Two</a> </li>
                                              <li><a href="{{ asset('/') }}frontend/contact3.html">Contact Three</a> </li>
                                              <li><a href="{{ asset('/') }}frontend/contact4.html">Contact Four</a> </li>
                                           </ul> --}}
                                       </li>
                                   </ul> <!-- //.nav-menu -->
                                </nav>
                            </div> <!-- //.main-menu -->
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->

        <!-- Canvas Menu start -->
        {{-- <nav class="right_menu_togle hidden-md">
            <div class="close-btn">
                <div id="nav-close">
                    <div class="line">
                        <span class="line1"></span><span class="line2"></span>
                    </div>
                </div>
            </div>
            <div class="canvas-logo">
                <a href="index.html"><img src="{{ asset('/') }}frontend/assets/images/logo-dark.png" alt="logo"></a>
            </div>
            <div class="offcanvas-text">
                <p>We denounce with righteous indige nationality and dislike men who are so beguiled and demo  by the charms of pleasure of the moment data com so blinded by desire.</p>
            </div>
            <div class="offcanvas-gallery">
                <div class="gallery-img">
                    <a class="image-popup" href=""><img src="{{ asset('/') }}frontend/assets/images/gallery/1.jpg" alt=""></a>
                </div>
                <div class="gallery-img">
                    <a class="image-popup" href=""><img src="{{ asset('/') }}frontend/assets/images/gallery/2.jpg" alt=""></a>
                </div>
                <div class="gallery-img">
                    <a class="image-popup" href=""><img src="{{ asset('/') }}frontend/assets/images/gallery/3.jpg" alt=""></a>
                </div>
                <div class="gallery-img">
                    <a class="image-popup" href=""><img src="{{ asset('/') }}frontend/assets/images/gallery/4.jpg" alt=""></a>
                </div>
                <div class="gallery-img">
                    <a class="image-popup" href=""><img src="{{ asset('/') }}frontend/assets/images/gallery/5.jpg" alt=""></a>
                </div>
                <div class="gallery-img">
                    <a class="image-popup" href=""><img src="{{ asset('/') }}frontend/assets/images/gallery/6.jpg" alt=""></a>
                </div>
            </div>
            <div class="map-img">
                <img src="{{ asset('/') }}frontend/assets/images/map.jpg" alt="">
            </div>
            <div class="canvas-contact">
                <ul class="social">
                    <li><a href="{{ asset('/') }}frontend/#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="{{ asset('/') }}frontend/#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="{{ asset('/') }}frontend/#"><i class="fa fa-pinterest-p"></i></a></li>
                    <li><a href="{{ asset('/') }}frontend/#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </nav> --}}
        <!-- Canvas Menu end -->
    </header>
    <!--Header End-->
</div>
