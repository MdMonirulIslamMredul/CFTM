@extends('admin.master')
@section('title')
    Service Edit
@endsection
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('attribute.update',$attribute->id)}}" enctype="multipart/form-data" method="POST">
                        @method('put')
                        @csrf


                        <h3>Front page information</h3>
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control" rows="5" name="name" id="name" value="{{$attribute->name}}">
                        </div>
                        <div class="form-group">
                            <label>Active/Deactive</label>
                            <select class="form-control" name="status">
                                <option value="1" @if ($attribute->status == 1) selected @endif>Active</option>
                                <option value="0" @if ($attribute->status == 0) selected @endif>Deactive</option>
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
