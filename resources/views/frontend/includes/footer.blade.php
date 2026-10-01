
<style>
 /* CSS */
a[data-title]::after {
    content: attr(data-title);
    position: absolute;
    background: rgba(0, 0, 0, 0.8);
    color: #fff;
    padding: 5px;
    border-radius: 3px;
    z-index: 9999;
    white-space: nowrap;
    display: none;
}

a:hover[data-title]::after {
    display: block;
}
</style>
<footer id="rs-footer" class="rs-footer ">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 footer-widget">
                    <h3 class="widget-title">About</h3>
                      <div class="textwidget white-color pr-60 md-pr-15"><p>{!! $about->title ??null !!}</p>
                      </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 footer-widget md-mb-50">
                    <h4 class="widget-title">Links</h4>
                    <ul class="site-map">
                        <li><a href="{{ route('front.page') }}">Home</a></li>
                        <li><a href="{{ route('gallery.page') }}">Gallary</a></li>
                        <li><a href="{{ route('admission.page') }}">Admission</a></li>
                       
                    </ul>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 footer-widget">
                    <h3 class="widget-title">Recent Posts</h3>
                    @foreach ($blogs->take(2) as $blog)
                    <div class="recent-post mb-20">
                        <div class="post-img">
                            <img src="{{ asset($blog->main_image) }}" alt="">
                        </div>
                        <div class="post-item">
                            <div class="post-desc">
                                <a href="{{ route('blogs.details',$blog->id) }}" data-title="{{ $blog->title }}">{{ \Illuminate\Support\Str::limit($blog->title, 20) }}</a>
                            </div>
                            <span class="post-date">
                                <i class="fa fa-calendar"></i>
                                {{ $blog->created_at->format('F d, Y') }}
                            </span>
                            
                        </div>
                    </div> 
                    @endforeach
                </div>
                @php
                    $link=App\Models\WebsiteLinks::latest()->first()
                @endphp
                <div class="col-lg-3 col-md-12 col-sm-12 footer-widget">
                    <h4 class="widget-title">Address</h4>
                    <ul class="address-widget">
                        <li>
                            <i class="flaticon-location"></i>
                            <div class="desc">{{ $link->address ??null }}</div>
                        </li>
                        <li>
                            <i class="flaticon-call"></i>
                            <div class="desc">
                                <a href="tel:{{ $link->number  ??null}}">{{ $link->number ??null}}</a> ,
                                {{-- <a href="{{ asset('/') }}frontend/tel:(123)-456-7890">(123)-456-7890</a> --}}
                            </div>
                        </li>
                        <li>
                            <i class="flaticon-email"></i>
                            <div class="desc">
                                <a href="mailto:{{ $link->email ??null }}">{{ $link->email ??null }}</a> ,
                                {{-- <a href="{{ asset('/') }}frontend/#">www.yourname.com</a> --}}
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row y-middle">
                <div class="col-lg-4 md-mb-20">
                    @php
                        $logo=App\Models\Logo::latest()->first();
                    @endphp
                    <div class="footer-logo md-text-center">
                        <a href="index.html"><img src="{{ asset($logo->logo_image) }}" alt="" style="height: 80px"></a>
                    </div>
                </div>
                <div class="col-lg-4 md-mb-20">
                    {{-- {{ dd($footer) }} --}}
                    <div class="copyright text-center md-text-left">
                        <p>&copy; 2024 {{ $footer->credit }} </p>
                    </div>
                </div>
                <div class="col-lg-4 text-right md-text-left">
                    <ul class="footer-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{ asset('/') }}frontend/#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="{{ asset('/') }}frontend/#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="{{ asset('/') }}frontend/#"><i class="fa fa-pinterest-p"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
