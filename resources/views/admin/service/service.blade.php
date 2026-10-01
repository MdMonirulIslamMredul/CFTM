@extends('admin.master')
@section('title')
    Program
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
                    <form class="form-horizontal" action="{{route('store.services')}}" enctype="multipart/form-data" method="POST">
                        @csrf

                        <h3>Front page information</h3>
                        <div class="form-group">
                            <label >Category Name</label>
                            <div class="col-md-12">
                                {{-- {{ dd($categories) }} --}}
                                <select class=" form-control select2 rounded-2" name="category_id" onchange="setSubCategory(this.value)">
                                    <option disabled selected >--Select Category--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                        <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Course Title</label>
                            <input type="text" class="form-control" rows="5" name="course_title" id="service_title" placeholder="Program Title">
                        </div>
                        <div class="form-group">
                            <label>Course Image</label>
                            <input type="file" name="main_image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Course Small Details</label>
                            <textarea  class="summernote form-control" col="10" row="3" name="course_details_small"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Long Details one</label>
                            <textarea  class=" summernote editor form-control" row="3" name="course_details1"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Long Details two</label>
                            <textarea  class="summernote editor form-control" row="3" name="course_details2"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Long Details three</label>
                            <textarea  class="summernote editor form-control" col="10" row="3" name="course_details3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Service Price</label>
                            <input type="text" class="form-control" rows="5" name="course_price" id="course_price" placeholder="Course Price">
                        </div>

                        <div class="form-group">
                            <label>Add to Homepage</label>
                            <select class="form-control" name="course_home">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <table id="config-table" class="table display table-striped border no-wrap">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                       <th>Category</th>
                        <th>Active/Deactive</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td><img src="{{ asset($service->main_image) }}" style="height: 100px"></td>
                            <td>{{ $service->course_title ?? null }}</td>
                            <td>{{ $service->category->name ?? null }}</td>
                            <td>
                                @if ($service->status == 1)
                                    <button class="btn btn-sm btn-primary">Active</button>
                                @elseif($service->status == 0)
                                    <button class="btn btn-sm btn-danger">Deactive</button>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('edit.services',['id'=>$service->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
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
