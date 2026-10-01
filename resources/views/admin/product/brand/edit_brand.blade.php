@extends('admin.master')
@section('title')
    Service Edit
@endsection
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('brand.update',$brand->id)}}" enctype="multipart/form-data" method="POST">
                        @method('put')
                        @csrf
                        <input type="hidden" value="{{$brand->id}}" name="id">

                        <h3>Brand page information</h3>
                        <div class="form-group">
                            <label>brand Name</label>
                            <input type="text" class="form-control" rows="5" name="name" id="name" value="{{$brand->name}}">
                        </div>
                        <div class="form-group">
                            <label>brand Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <img src="{{asset($brand->image)}}" class="mb-2" height="100" width="100" alt="">

                        <div class="form-group">
                            <label>brand Details</label>
                            <textarea class="editor form-control" col="30" row="3" name="description">{!! $brand->description !!}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Active/Deactive</label>
                            <select class="form-control" name="status">
                                <option value="1" @if ($brand->status == 1) selected @endif>Active</option>
                                <option value="0" @if ($brand->status == 0) selected @endif>Deactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Update</button>
                    </form>                </div>
            </div>
        </div>
    </div>
    {{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#default'
        });
    </script> --}}
@endsection
