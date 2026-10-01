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
    
   
    {{-- {{ dd($doctor) }} --}}
    <div class="col-lg-9 py-5">
        
        <div class="card">
            <div class="card-header">
                <table  id="config-table" class="table display table-striped border no-wrap">
                    <thead>
                        <h3>Details</h3>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Service Name</th>
                       {{-- <th>Date</th> --}}
                       <th>Time</th>
                       <th>Extend Date</th>
                       <th>Action</th>
                       <th>Status</th>
                       
                       
                    </tr>
                    </thead>
                    <tbody>
                   {{-- {{ dd($user) }} --}}
                   @foreach ($info->dates as $date)
                   <tr> 
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $info->name  ?? null }}</td>
                    <td>{{ $info->number ?? null }}</td>
                    <td>{{ $info->service->service_title ?? null }}</td>
                    <td>{{ $info->select_time ?? null }}</td>
                    <td>{{ $date->date ?? null }}</td>
                    <td>
                        @if ($date->status == 1)
                            <button class="btn btn-sm btn-success">Accepted</button>
                        @elseif($date->status == 0)
                            <button class="btn btn-sm btn-primary">Pending</button>
                        @endif
                        
                    </td>
                    <td>
                         <a href="{{ route('approve.date',['id'=>$date->id]) }}" class="btn btn-success">Accept</a>
                                
                    </td>
                    
                    @endforeach
                     </tr>
                  
                   
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    

@endsection
