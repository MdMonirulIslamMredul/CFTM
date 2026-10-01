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
                    <form class="form-horizontal" action="{{route('admission-require.update',$info->id)}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label >Department Name</label>
                            <div class="col-md-4">
                                <select class=" form-control select2 rounded-2" name="department_id">
                                    <option disabled selected >--Select Department--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $info->department_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" rows="5" name="title" id="title" placeholder="Title" value="{{ $info->title }}" required>
                        </div>

                        <div class="form-group">
                            <label>Details One</label>
                            <textarea  class="summernote form-control" col="10" row="3" name="details" >{{ $info->details }}</textarea>
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
