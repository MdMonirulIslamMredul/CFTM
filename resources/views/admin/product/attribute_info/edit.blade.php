@extends('admin.master')
@section('title')
    Service Edit
@endsection
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('attribute-info.update',$attributeInfo->id)}}" enctype="multipart/form-data" method="POST">
                        @method('put')
                        @csrf

                        <h3>Sub Category page information</h3>
                        <div class="form-group">
                            <label >Attribute Name</label>
                            <div class="col-md-4">
                                <select class=" form-control select2 rounded-2" name="attribute_id">
                                    <option disabled selected >--Select Attribute--</option>
                                    @foreach ($attributes as $attribute)
                                        <option value="{{ $attribute->id }}" {{ $attributeInfo->attribute_id == $attribute->id ?'selected' : '' }}>{{ $attribute->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Input Field 1</label>
                            <input type="text" class="form-control" rows="5" name="name" id="name" value="{{ $attributeInfo->field_1 }}">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
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
