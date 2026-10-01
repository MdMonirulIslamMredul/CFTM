<section class="service-wrap style2 ">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <div class="section-title style2 text-center mb-40">
                    <h2>Our Services</h2>
                    @foreach($titles as $data)
                        @if($data->page == 'services' )
                    <h2>{{$data->title}}</h2>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
        <style>
            .blinking {
    animation: blinkingText 1s infinite;
}
        </style>
        <!-- Service Section Start -->
        <section class="service-wrap ptb-100">
            <div class="container">
                <div class="row justify-content-center">
                    @foreach($services as $service)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="service-card style1">
                            <div class="service-img">
                                <img src="{{asset($service->main_image)}}" height="250px" width="100%" alt="Image">
                            </div>
                            <div class="service-info">
                                <h3><a href="{{route('services.details',['id'=>$service->id])}}">{{$service->service_title}}</a></h3>
                                <span style="
    color: #18d219;border-radius: 3px;    
    font-weight: 900;" class="blinking">Home Service Available</span>
                                <p> {!! Str::limit($service->service_details_small, 250) !!} </p>
                                <a href="{{route('services.details',['id'=>$service->id])}}" class="link style2">Explore More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Service Section End -->
    </div>
</section>
        <!-- Service Section Start -->
        <section class="service-wrap ptb-100">
            <div class="container">
                <div class="row ">
                    @foreach($galleries as $gallery)
                        <div class="col-md-4">
                            {!! $gallery->video_link !!}
                        </div>
                    @endforeach

                </div>
            </div>
        </section>

