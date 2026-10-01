@extends('admin.master')
@section('title')
    Service Edit
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
                    <form action="{{route('category.update',$category->id)}}" enctype="multipart/form-data" method="POST">
                        @method('put')
                        @csrf
                        <input type="hidden" value="{{$category->id}}" name="id">

                        <h3>Front page information</h3>
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control" rows="5" name="name" id="name" value="{{$category->name}}">
                        </div>
                        <div class="form-group">
                            <label>Category Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <img src="{{asset($category->image)}}" class="mb-2" height="100" width="100" alt="">
                        
                        <div class="form-group">
                            <label>Category Details</label>
                            <textarea class="editor form-control" col="30" row="3" name="description">{!! $category->description !!}</textarea>
                        </div>

                    

                        {{-- <div class="form-group">
                            <label>Add to Homepage</label>
                            <select class="form-control" name="service_home">
                                <option value="1" @if ($service->service_home == 1) selected @endif>Yes</option>
                                <option value="0" @if ($service->service_home == 0) selected @endif>No</option>
                            </select>
                        </div> --}}

                        <div class="form-group">
                            <label>Active/Deactive</label>
                            <select class="form-control" name="status">
                                <option value="1" @if ($category->status == 1) selected @endif>Active</option>
                                <option value="0" @if ($category->status == 0) selected @endif>Deactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Update</button>
                    </form>                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#default'
        });
    </script>
@endsection
