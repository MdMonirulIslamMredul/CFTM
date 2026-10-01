@extends('frontend.master')
@section('title')
    details
@endsection
@section('content')
 <!-- Breadcrumbs Start -->
 <div class="rs-breadcrumbs breadcrumbs-overlay">
    <div class="breadcrumbs-img">
        <img src="{{ asset('/') }}frontend/assets/images/breadcrumbs/2.jpg" alt="Breadcrumbs Image">
    </div>
    <div class="breadcrumbs-text white-color">
        <h1 class="page-title">{{ $blog->title }}</h1>
        <ul>
            <li>
                <a class="active" href="index.html">Home</a>
            </li>
            <li>Blog Post Right</li>
        </ul>
    </div>
</div>
<!-- Breadcrumbs End -->            

<!-- Blog Section Start -->
<div class="rs-inner-blog orange-color pt-100 pb-100 md-pt-70 md-pb-70">
    <div class="container">
        <div class="row">
            {{-- <div class="col-lg-4 col-md-12 order-last">
                <div class="widget-area">
                    <div class="search-widget mb-50">
                        <div class="search-wrap">
                            <input type="search" placeholder="Searching..." name="s" class="search-input" value="">
                            <button type="submit" value="Search"><i class=" flaticon-search"></i></button>
                        </div>
                    </div>
                    <div class="recent-posts mb-50">
                        <h3 class="widget-title">Recent Posts</h3>
                        <ul>
                            <li><a href="#">University while the lovely valley team work</a></li>
                            <li><a href="#">High school program starting soon 2021</a></li>
                            <li><a href="#">Modern School the lovely valley team work</a></li>
                            <li><a href="#">While the lovely valley team work</a></li>
                            <li><a href="#">This is a great source of content for anyone…</a></li>
                        </ul>
                    </div>
                    <div class="widget-archives mb-50">
                        <h3 class="widget-title">Archives</h3>
                        <ul>
                            <li><a href="#">September 2020</a></li>
                            <li><a href="#">September 2020</a></li>
                        </ul>
                    </div>   
                    <div class="widget-archives mb-50">
                        <h3 class="widget-title">Categories</h3>
                        <ul>
                            <li><a href="#">College</a></li>
                            <li><a href="#">High School</a></li>
                            <li><a href="#">Primary</a></li>
                            <li><a href="#">School</a></li>
                            <li><a href="#">University</a></li>
                        </ul>
                    </div>
                      <div class="recent-posts mb-50">
                          <h3 class="widget-title">Meta</h3>
                          <ul>
                              <li><a href="#">Log in</a></li>
                              <li><a href="#">Entries feed</a></li>
                              <li><a href="#">Comments feed</a></li>
                              <li><a href="#">WordPress.org</a></li>
                          </ul>
                      </div>
                </div>
            </div> --}}
            <div class="col-lg-12 pr-50 md-pr-15">
               <div class="blog-deatails">
                    <div class="bs-img ">
                        <a href="#"><img  src="{{ asset($blog->main_image) }}" alt="" style="height: 500px; "></a>
                    </div>
                   <div class="blog-full">
                       <ul class="single-post-meta">
                           <li>
                               <span class="p-date"> <i class="fa fa-calendar-check-o"></i> {{ $blog->created_at }} </span>
                           </li> 
                           <li>
                               <span class="p-date"> <i class="fa fa-user-o"></i> admin </span>
                           </li> 
                           <li class="Post-cate">
                               <div class="tag-line">
                                   <i class="fa fa-book"></i>
                                   <a href="#">Strategy</a>
                               </div>
                           </li>
                           <li class="post-comment"> <i class="fa fa-comments-o"></i> 0</li>
                       </ul>
                       
                       <div class="blog-desc mb-40">
                           <p>
                               {!! $blog->details1 !!}
                           </p>
                       </div>
                       
                       <div class="blog-img mb-40">
                           <img class="w-100" src="{{ asset($blog->banner_image) }}" alt="" style="height: 500px">
                       </div>
                       <div class="blog-desc mb-40">
                           <p>
                               {!! $blog->details2 !!}
                           </p>
                       </div>
                      
                      
                      
                   </div>
               </div>
               {{-- <div class="ps-navigation">
                   <ul>
                       <li><a href="#"><span class="next-link">Next<i class="flaticon-next"></i></span></a></li>
                       <li><a href="#"><span class="link-text">Soundtrack filma Lady Exclusive Music </span></a></li>
                   </ul>
               </div> --}}
               <div class="comment-area">
                  <div class="comment-full">
                      <h3 class="reply-title">Leave a Reply</h3>
                        <p>
                          <span>Your email address will not be published. Required fields are marked </span>
                        </p>
                        <form id="contact-form" method="post" action="mailer.php">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Name*</label>
                                        <input type="text" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input type="email" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mb-35">
                                    <div class="form-group">
                                        <label>Your comment here...</label>
                                        <textarea cols="40" rows="10" class="textarea form-control" required=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="submit-btn">
                            <input name="submit" type="submit" id="submit" class="submit" value="Post Comment">
                        </div>
                  </div>
               </div>
            </div>
        </div> 
    </div>
</div>
<!-- Blog Section End -->  
@endsection
