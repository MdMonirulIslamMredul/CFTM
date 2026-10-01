@extends('admin.master')
@section('title')
    Service Order settings
@endsection
@section('body')
    @if(auth()->user()->is_admin == 1)
    <div class="row pt-5 ">
        <div class="col-lg-6 ms-5">
            <div class="card ">

                @if(session('message'))
                    <div class="alert alert-success" role="alert">
                        {{session('message')}}
                    </div>
                @endif
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('update.info',['id'=>$info->id])}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <h3 class="fw-bold">Asign Doctor</h3>
                        </div>
                        <div class="form-group">
                            <label>Asign Doctor</label>
                            <div class="col-md-10">
                                <select class="form-control" name="doctor_id">
                                    <option disabled selected >--Select Doctor--</option>
                                   
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}"{{ $doctor->id == $info->doctor_id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                                    @endforeach
                                </select>
                            </div>   
                        </div>

                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info mt-3">Submit</button>
                        </div>
                    </form>
                </div>
                
                <div class="card-body py-5">
                    <form class="form-horizontal" action="{{ route('more.date',$info->id) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <h3 class="fw-bold">Date & Time</h3>
                        </div>
                        <div class="row">
                          
                               <div class="row">
                                <label class="col-md-4">Date</label>
                                
                                <div class="col-md-8">
                                   {{-- {{ dd($request->all()) }} --}}
                                    <input type="date" class="form-control" readonly value="{{ $info->date }}"/>
                                   
                                </div>
                               </div>
                               <div class="row mt-3">
                                <label class="col-md-4">Time</label>
                                
                                <div class="col-md-8">
                                   {{-- {{ dd($request->all()) }} --}}
                                    <input type="text" class="form-control" readonly value="{{ $info->select_time }}"/>
                                   
                                </div>
                               </div>
                               <div class="row mt-3">
                                <label class="col-md-4">Requested Extend Date</label>
                                
                                <div class="col-md-8">
                                   {{-- {{ dd($request->all()) }} --}}
                                   @foreach ($info->dates as $date )
                                   <input type="text" class="form-control" readonly value="{{ $date->date }}"/>
                                   @endforeach
                                   
                                </div>
                               </div>
                           

                        </div>
                        
                        <div class="form-group pt-5">
                            <h3 class="fw-bold">Extend Date</h3>
                        </div>
                        <div class="col-md-6">
                            <div class="field_wrapper mt-3">
                                <label >Date</label>
                                <div class="d-flex">
                                   {{-- {{ dd($request->all()) }} --}}
                                    <input type="date" class="form-control" name="dates[]"  />
                                    <a href="javascript:void(0);" class="add_button m-3" title="Add field"><img src="{{ asset('/') }}admin/assets/images/add-icon.png" style="height: 20px"/></a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info mt-3">Submit</button>
                        </div>
                    </form>
                </div>
               
            </div>
        </div>
    </div>
    @endif
    @if (auth()->user()->is_admin == 2)
    <div class="col-lg-6 py-5">
        <div class="card ">

            @if(session('message'))
                <div class="alert alert-success" role="alert">
                    {{session('message')}}
                </div>
            @endif
            <div class="card-body">
                <form class="form-horizontal" action="{{route('accept.info',['id'=>$info->id])}}" method="POST">
                    @csrf
                    {{-- @if($info->extend_date > 0)
                    <div class="attr-detail attr-color mb-15">
                        <strong class="fw-bold">Extend Date: </strong>
                        <div class="mt-2">
                            {{-- {{ dd($info->dates->all()) }} --}}
                            {{-- <select multiple class="form-control select2 form-select" data-placeholder="Select Date" name="extend_date">
                                <option value="" disabled selected>--Select Date--</option>
                                @foreach ($info->dates as $key => $date)
                                    <option value="{{ $date->date }}">{{ $date->date }}</option>
                                @endforeach
                            </select> --}}
                            {{-- @foreach ($info->dates as $key => $date)
                                    <label >
                                        <input type="radio" style="width: 20px; height:10px" name="extend_date" value="{{ $date->date }}" {{ $key == $info->extend_time ? 'checked':''}} /> {{ $date->date }}</label>
                            @endforeach
                        </div>
                    </div>
                    @endif --}}
                    <div class="form-group py-3">
                        <label class="fw-bold mb-2">Approval Selection</label>
                        <div class="col-md-5">
                            <select class="form-control" name="approval_status">
                                <option disabled selected >--Select --</option>
                                <option value="1" {{ $info->approval_status == 1 ? 'selected' : '' }}>Accept</option>
                                <option value="0" {{ $info->approval_status == 0 ? 'selected' : '' }}>Decline</option>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>   
    @endif
    @if(auth()->user()->is_admin == 0)
    <div class="row pt-5 ">
        <div class="col-lg-6 ms-5">
            <div class="card ">

                @if(session('message'))
                    <div class="alert alert-success" role="alert">
                        {{session('message')}}
                    </div>
                @endif
                <div class="card-body py-5">
                    <form class="form-horizontal" action="{{ route('more.date',$info->id) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <h3 class="fw-bold">Date & Time</h3>
                        </div>
                        <div class="row">
                          
                               <div class="row">
                                <label class="col-md-4">Date</label>
                                
                                <div class="col-md-8">
                                   {{-- {{ dd($request->all()) }} --}}
                                    <input type="date" class="form-control" readonly value="{{ $info->date }}"/>
                                   
                                </div>
                               </div>
                               <div class="row mt-3">
                                <label class="col-md-4">Time</label>
                                
                                <div class="col-md-8">
                                   {{-- {{ dd($request->all()) }} --}}
                                    <input type="text" class="form-control" readonly value="{{ $info->select_time }}"/>
                                   
                                </div>
                               </div>
                           

                        </div>
                        
                        <div class="form-group pt-5">
                            <h3 class="fw-bold">Extend Date</h3>
                        </div>
                        <div class="col-md-6">
                            <div class="field_wrapper mt-3">
                                <label >Date</label>
                                <div class="d-flex">
                                   {{-- {{ dd($request->all()) }} --}}
                                    <input type="date" class="form-control" name="dates[]" />
                                    <a href="javascript:void(0);" class="add_button m-3" title="Add field"><img src="{{ asset('/') }}admin/assets/images/add-icon.png" style="height: 20px"/></a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info mt-3">Submit</button>
                        </div>
                    </form>
                </div>
               
            </div>
        </div>
    </div>
    @endif
@endsection
