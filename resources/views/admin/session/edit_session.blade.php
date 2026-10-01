@extends('admin.master')
@section('title')
    Package edit
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
                <div class="card-body">
                    <form action="{{route('update.session')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <h3>Front Page Information</h3>
                        <input type="hidden" value="{{$session->id}}" name="id">

                        <div class="form-group">
                            <label>Session</label>
                            <input type="text" class="form-control" rows="5" name="session" value="{{$session->session}}" >
                        </div>
                        <div class="form-group">
                            <label>Active/Deactive</label>
                            <select class="form-control" name="status">
                                <option value="1" @if ($session->status == 1) selected @endif>Active</option>
                                <option value="0" @if ($session->status == 0) selected @endif>Deactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Update</button>
                        

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection
