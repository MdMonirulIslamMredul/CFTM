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
                    <form action="{{route('update.services')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" value="{{$service->id}}" name="id">

                        <h3>Front page information</h3>
                        <div class="form-group">
                            <label>Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="category_id">
                                    <option disabled selected >--Select --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"{{ $service->category_id == $category->id ?'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label >Sub Category Name</label>
                            <div class="col-md-12">
                                {{-- {{ dd($categories) }} --}}
                                <select class=" form-control select2 rounded-2" name="sub_category_id" id="subCategoryId" >
                                    <option disabled selected >--Select Sub Category--</option>
                                    @foreach ($subCategories as $subCategory)
                                        <option value="{{ $subCategory->id }}" {{ $service->sub_category_id == $subCategory->id ?'selected' : '' }}>{{ $subCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Service Title</label>
                            <input type="text" class="form-control" rows="5" name="course_title" id="course_title" value="{{$service->course_title}}" placeholder="Service Title">
                        </div>
                        <div class="form-group">
                            <label>Service Image</label>
                            <input type="file" name="main_image" class="form-control">
                        </div>
                        <img src="{{asset($service->main_image)}}" class="mb-2" height="100" width="100" alt="">
                        <div class="form-group">
                            <label>Service Small Details</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="course_details_small">{!! $service->course_details_small !!}</textarea>
                        </div>

                       




                        <div class="form-group">
                            <label>Service Long Details one</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="course_details1">{!! $service->course_details1 !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Service Long Details two</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="course_details2">{!! $service->course_details2 !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Service Long Details three</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="course_details3">{!! $service->course_details3 !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Service Price</label>
                            <input type="text" class="form-control" rows="5" name="service_price" id="course_price" value="{{$service->course_price}}" placeholder="Service Price">
                        </div>
                        <div class="form-group">
                            <label>Add to Homepage</label>
                            <select class="form-control" name="course_home">
                                <option value="1" @if ($service->course_home == 1) selected @endif>Yes</option>
                                <option value="0" @if ($service->course_home == 0) selected @endif>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Active/Deactive</label>
                            <select class="form-control" name="status">
                                <option value="1" @if ($service->status == 1) selected @endif>Active</option>
                                <option value="0" @if ($service->status == 0) selected @endif>Deactive</option>
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
