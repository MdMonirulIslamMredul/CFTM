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
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('update.appointment.info')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @if($info!=null)
                            <input type="hidden" value="{{$info->id}}" name="id">
                        @endif

                        <div class="form-group">
                            <label>Appointment Title</label>
                            <input type="text" class="form-control" rows="5" name="title" id="title" value="{{ $info->title }}" placeholder="About Title" required>
                        </div>

                        <div class="form-group">
                            <label>Details One</label>
                            <textarea  class="summernote form-control" col="10" row="3" name="details1" >{{ $info->details1 }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Details Two</label>
                            <textarea  class="summernote form-control" col="10" row="3" name="details2" >{{ $info->details2 }}</textarea>
                        </div><div class="form-group">
                            <label>Details Three</label>
                            <textarea  class="summernote form-control" col="10" row="3" name="details3" >{{ $info->details3 }}</textarea>
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
