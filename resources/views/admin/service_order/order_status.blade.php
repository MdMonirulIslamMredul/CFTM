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
                    <h3 class="title">Service Order List</h3>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Email Addess</th>
                        <th>Service Name</th>
                        <th>Status</th>
                       
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($infos as $info)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $info->name ?? null }}</td>
                            <td>{{ $info->number ?? null }}</td>
                            <td>{{ $info->email ?? null }}</td>
                            <td>{{ $info->service->service_title ?? null }}</td>
                            <td>
                                @if ($info->approval_status == 1)
                                    <button class="btn btn-sm btn-success">Accepted</button>
                                @elseif($info->approval_status == 0)
                                    <button class="btn btn-sm btn-primary">Pending</button>
                                @endif
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
                    <thead>
                    <tr>
                       
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Service Name</th>
                        {{-- <th>Doctor Name</th> --}}
                       <th>Time</th>
                       <th>Date</th>
                       <th>Extend Date</th>
                        <th>Status</th>
                       
                    </tr>
                    </thead>
                    <tbody>
                   
                    @foreach ($infos as $info)
                        {{-- {{ dd($info->doctor->name) }} --}}
                        @if ( $info->doctor->name  == auth()->user()->name )
                        
                        <tr>
                            
                            <td>{{ $info->name ?? null }}</td>
                            <td>{{ $info->number ?? null }}</td>
                            <td>{{ $info->service->service_title ?? null }}</td>
                            {{-- <td>{{ $info->doctor->name ?? null }}</td> --}}

                            <td>{{ $info->select_time ?? null }}</td>
                            <td>{{ $info->date ?? null }}</td>

                            <td>
                            @foreach ($info->dates as $date)
                            @if($date->status == 1 )
                            <p>{{ $date->date  ?? null }} {{ $loop->last ? '': ',' }}</p>
                            @endif
                            @endforeach
                        </td>
                            <td>
                                @if ($info->approval_status == 1)
                                    <button class="btn btn-sm btn-success">Accepted</button>
                                @elseif($info->approval_status == 2)
                                    <button class="btn btn-sm btn-primary">Pending</button>
                                @endif
                                
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
                <h3 class="title">Order</h3>
                <table id="config-table" class="table display table-striped border no-wrap">
                    <thead>
                    <tr>
                        
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Service Name</th>
                        <th>Doctor Name</th>
                        <th>Time</th>
                       <th>Date </th>
                       <th>Extend Date</th>
                        <th>Status</th>
                       
                       
                    </tr>
                    </thead>
                    <tbody>
                   
                    @foreach ($infos as $info)
                        {{-- {{ dd($user) }} --}}
                        @if ( $info->name  == auth()->user()->name )
                        <tr>
                           
                            <td>{{ $info->name ?? null }}</td>
                            <td>{{ $info->number ?? null }}</td>
                            <td>{{ $info->service->service_title ?? null }}</td>
                            <td>{{ $info->doctor->name ?? null }}</td>
                            <td>{{ $info->select_time }}</td>
                            <td>{{ $info->date ?? null }}</td>
                            <td>
                                @foreach ($info->dates as $date)
                                @if($date->status == 1 )
                                <p>{{ $date->date  ?? null }} {{ $loop->last ? '': ',' }}</p>
                                @endif
                                @endforeach
                            </td>
                            <td>
                                @if ($info->approval_status == 1)
                                    <button class="btn btn-sm btn-success">Accepted</button>
                                @elseif($info->approval_status == 0)
                                    <button class="btn btn-sm btn-primary">Pending</button>
                               
                                @endif
                                
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
