@extends('admin.master')
@section('title')
    Appointment settings
@endsection
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">

                @if(session('message'))
                    <div class="alert alert-success" role="alert">
                        {{session('message')}}
                    </div>
                @endif
               
            </div>
        </div>
    </div>
    @if(auth()->user()->is_admin == 1)
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <table id="config-table" class="table display table-striped border no-wrap">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Email Addess</th>
                        <th>Date</th>
                        <th>Service Name</th>
                       
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($infos as $info)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $info->name ?? null }}</td>
                            <td>{{ $info->number ?? null }}</td>
                            <td>{{ $info->email ?? null }}</td>
                            <td>{{ $info->date ?? null }}</td>
                            <td>{{ $info->service->service_title ?? null }}</td>
                                <td>
                                    <a href="{{ route('approve.order',['id'=>$info->id]) }}" class="btn btn-info">Approve</a>
                                </td>
                            
                        </tr>
                    @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
    @endif
    @if(auth()->user()->is_admin == 2)
    {{-- {{ dd($doctor) }} --}}
    <div class="col-lg-9 py-5">
        
        <div class="card">
            <div class="card-header">
               
                <table id="config-table" class="table display table-striped border no-wrap">
                    <h3 class="title">Service Order Page</h3>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Service Name</th>
                       <th>Doctor Name</th>
                       <th>Date</th>
                       
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                   
                    @foreach ($infos as $info)
                        {{-- {{ dd($user) }} --}}
                        @if ( $info->doctor->name == auth()->user()->name )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $info->name  ?? null }}</td>
                            <td>{{ $info->number ?? null }}</td>
                            <td>{{ $info->service->service_title ?? null }}</td>
                            <td>{{ $info->doctor->name ?? null }}</td>
                            <td>{{ $info->date }}</td>
                           
                                <td>
                                    <a href="{{ route('approve.order',['id'=>$info->id]) }}" class="btn btn-success">Accept</a>
                                    <a href="{{ route('details.order',['id'=>$info->id]) }}" class="btn btn-info ms-2">Details</a>
                                </td>
                            
                        </tr>
                        @endif
                   
                    
                @endforeach
                   
                   

                    </tbody>

                </table>
            </div>
        </div>
    </div>
    @endif
    @if(auth()->user()->is_admin == 0)
    {{-- {{ dd($doctor) }} --}}
    <div class="col-lg-9 py-5">
        
        <div class="card">
            <div class="card-header">
               
                <table id="config-table" class="table display table-striped border no-wrap">
                    <h3 class="title">Service Order Page</h3>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Service Name</th>
                       <th>Doctor Name</th>
                       <th>Date</th>
                       
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                   
                    @foreach ($infos as $info)
                        {{-- {{ dd($user) }} --}}
                        @if ( $info->name == auth()->user()->name )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $info->name  ?? null }}</td>
                            <td>{{ $info->number ?? null }}</td>
                            <td>{{ $info->service->service_title ?? null }}</td>
                            <td>{{ $info->doctor->name ?? null }}</td>
                            <td>{{ $info->date }}</td>
                           
                                <td>
                                    <a href="{{route('approve.order',['id'=>$info->id])}}" class="btn btn-success ">Details</a>
                                </td>
                            
                        </tr>
                        @endif
                   
                    
                @endforeach
                   
                   

                    </tbody>

                </table>
            </div>
        </div>
    </div>
    @endif
   
@endsection
