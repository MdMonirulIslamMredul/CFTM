@extends('admin.master')
@section('title')
    Service Order settings
@endsection
@section('body')
    
   
    <div class="col-lg-6 py-5">
        <div class="card ">

            @if(session('message'))
                <div class="alert alert-success" role="alert">
                    {{session('message')}}
                </div>
            @endif
            <div class="card-body">
                <form class="form-horizontal" action="{{route('extend.date',['id'=>$date->id])}}" method="POST">
                    @csrf
                    <div class="form-group py-3">
                        <label class="fw-bold mb-2">Approval Selection</label>
                        <div class="col-md-5">
                            <select class="form-control" name="status">
                                <option disabled selected >--Select --</option>
                                <option value="1" {{ $date->status == 1 ? 'selected' : '' }}>Accept</option>
                                <option value="0" {{ $date->status == 0 ? 'selected' : '' }}>Decline</option>
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
   
@endsection
