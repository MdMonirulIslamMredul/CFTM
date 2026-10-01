@extends('frontend.master')
@section('title')
    Appointment
@endsection
@section('content')

    <!-- Content Wrapper Start -->
    <div class="content-wrapper">

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap bg-f" style="background-image: url({{asset($banner->image)}});">
            <div class="container">
                <div class="breadcrumb-title">
                    <h2>Book Appointment</h2>
                    <ul class="breadcrumb-menu list-style">
                        <li><a href="{{route('front.page')}}">Home </a></li>
                        <li>Appointment</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Appointment section Start -->
        <section class="appointment-form-wrap ptb-100">
            <div class="container">
                
                    <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 py-5">
                        <div class="row">
                            @if(session('message'))
                            <div class="alert alert-success" role="alert">
                                {{session('message')}}
                            </div>
                        @endif
                        <form action="{{route('appointment')}}" method="POST" class="book-appointment-form mt-5">
                            @csrf
                            <div class="content-title py-3">
                                <h4>Book an Appointment</h4>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-2 pt-2">Full Name</label>
                                        <div class="col-md-10">
                                            <input type="text" name="name" value="{{ $user->name ?? null }}" class="form-control" placeholder="Full Name" required />
                                        </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-2 pt-2">Phone Number</label>
                                        <div class="col-md-10">
                                            <input type="number" name="number" class="form-control" placeholder="Phone Number" required />
                                        </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-2 pt-2">Email</label>
                                        <div class="col-md-10">
                                            <input type="email" name="email" value="{{ $user->email ?? null }}" class="form-control" placeholder="Email Address"  />
                                        </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-2 pt-2">Service Name</label>
                                        <div class="col-md-10">
                                            <select name="service_id" id="select_time" class="form-control">
                                           
                                                <option value="0" data-display="Select Service" disabled selected>Select Services</option>
                                                <option value="{{$service->id}}" selected >{{$service->service_title}}</option>
                                                 @foreach($services as $service)
                                                 <option value="{{$service->id}}">{{$service->service_title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-2 pt-2">Date</label>
                                        <div class="col-md-10">
                                            <input type="date" name="date" class="form-control" required />
                                        </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-2 pt-2">Select Time</label>
                                        <div class="col-md-10">
                                            <select name="select_time" id="select_time" class="form-control" required>
                                                <option value="0" data-display="Select Time">Select Time</option>
                                                <option value="10 AM" >10:00 AM</option>
                                                <option value="11 AM" >11:00 AM</option>
                                                <option value="12 PM" >12:00 PM</option>
                                                <option value="3 PM" >3:00 PM</option>
                                                <option value="5 PM" >5:00 PM</option>
                                                <option value="7 PM" >7:00 PM</option>
                                            </select>
                                        </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn style1 d-block w-100">Book Appointment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Appointment section End -->

    </div>
    <!-- Content wrapper end -->
@endsection
