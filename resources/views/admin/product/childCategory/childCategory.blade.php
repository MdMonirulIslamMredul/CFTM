@extends('admin.master')
@section('title')
    Service
@endsection
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('product-child-category.store')}}" enctype="multipart/form-data" method="POST">
                        @csrf

                        <h3>Sub Category page information</h3>
                        <div class="form-group">
                            <label >Category Name</label>
                            <div class="col-md-4">
                                <select class=" form-control select2 rounded-2" name="product_category_id">
                                    <option disabled selected >--Select Category--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label > Sub Category Name</label>
                            <div class="col-md-4">
                                <select class=" form-control select2 rounded-2" name="product_sub_category_id">
                                    <option disabled selected >--Select Sub Category--</option>
                                    @foreach ($subCategories as $subCategory)
                                        <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Child Category Name</label>
                            <input type="text" class="form-control" rows="5" name="name" id="name" placeholder="Category Name">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea   class="form-control" col="10" row="30" name="description"></textarea>
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
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category Name</th>
                        <th>Sub Category Name</th>
                        <th>Active/Deactive</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($childCategories as $childCategory)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset($childCategory->image) }}" style="height: 100px"></td>
                            <td>{{ $childCategory->name ?? null }}</td>
                           <td>{{ $childCategory->productCategory->name ?? null }}</td>

                           <td>{{ $childCategory->productChildCategory->name ?? null }}</td>
                            <td>
                                @if ($childCategory->status == 1)
                                    <button class="btn btn-sm btn-primary">Active</button>
                                @elseif($childCategory->status == 0)
                                    <button class="btn btn-sm btn-danger">Deactive</button>
                                @endif
                            </td>
                            <td >
                                <a href="{{ route('product-child-category.edit',$childCategory->id) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

                        <!-- text-->
                        <form action="{{ route('product-child-category.destroy',$childCategory->id) }}" class="pt-2" id="deteleCategory" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm editProduct" onclick="return confirm('Are you sure to Delete?')"> Delete</button>
                        </form>

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
