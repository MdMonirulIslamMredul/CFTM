@extends('frontend.master')
@section('title')
    Facility
@endsection
@section('content')
           

<!-- Blog Section Start -->
<div class="rs-inner-blog orange-color pt-100 pb-100 md-pt-70 md-pb-70">
    <div class="container">
       <div class="blog-deatails">
            
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-7"> <!-- Adjust the column size as needed -->
                    <div class="blog-full">
                        <h2 class="title mb-40">{{ $item->title ?? null }}</h2>
                        <div class="blog-desc mb-35">
                            <p>
                                {!! $item->description ?? null !!}
                            </p>
                        </div>
                        <div class="blog-img mb-40">
                            <img src="{{ asset($item->image ?? null) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
       </div>
    </div>
</div>
<!-- Blog Section End --> 
@endsection
