@extends('admin.master')
@section('title')
    Service
@endsection
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('product.store')}}" enctype="multipart/form-data" method="POST">
                        @csrf

                        <h3>Product page information</h3>
                        <div class="form-group">
                            <label >Category Name</label>
                            <div class="col-md-4">
                                <select class=" form-control" onchange="setSubCategory(this.value)" name="product_category_id">
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
                                <select class=" form-control" id="subCategoryId" onchange="setChildCategory(this.value)" name="product_sub_category_id">
                                    <option disabled selected >--Select Sub Category--</option>
                                    @foreach ($subCategories as $subCategory)
                                        <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Child Sub Category Name</label>
                            <div class="col-md-4">
                                <select class=" form-control" id="childCategoryId"  name="product_child_category_id">
                                    <option disabled selected >--Select Child Sub Category--</option>
                                    @foreach ($childCategories as $childCategory)
                                        <option value="{{ $childCategory->id }}">{{ $childCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Brand Name</label>
                            <div class="col-md-4">
                                <select class=" form-control " name="brand_id">
                                    <option disabled selected >--Select Brand--</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Attribute Name</label>
                            <div class="col-md-4">
                                <select class=" form-control" onchange="setAttributeInfo(this.value)" name="attribute_id">
                                    <option disabled selected >--Select Attribute--</option>
                                    @foreach ($attributes as $attribute)
                                        <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Attribute  Info</label>
                            <div class="col-md-4">
                                <select class=" form-control select2 rounded-2" id="attributeInfoId" name="attrs[]" multiple>
                                    <option disabled selected >--Select Attribute Info--</option>
                                    @foreach ($attributeInfos as $attributeInfo)
                                        <option value="{{ $attributeInfo->id }}">{{ $attributeInfo->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control" rows="5" name="name" id="name" placeholder="Product Name">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Short Description</label>
                            <textarea   class="form-control" col="10" row="30" name="short_description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Long Description</label>
                            <textarea   class="form-control" col="10" row="30" name="long_description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Regular Price</label>
                            <input type="number" class="form-control" name="regular_price" placeholder="Regular Price">
                        </div>
                        <div class="form-group">
                            <label>Selling Price</label>
                            <input type="number" class="form-control" rows="5" name="selling_price" id="name" placeholder="Selling Price">
                        </div>
                        <div class="form-group">
                            <label>Stock Amount</label>
                            <input type="number" class="form-control"  name="stock_amount" id="name" placeholder="Stock Amount">
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
                        <th>Child Category Name</th>
                        <th>Brand Name</th>
                        <th>Attribute Info</th>
                        <th>Active/Deactive</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset($product->image) }}" style="height: 100px"></td>
                            <td>{{ $product->name ?? null }}</td>
                            <td>{{ $product->category->name ?? null }}</td>
                           <td>{{ $product->subCategory->name ?? null }}</td>
                           <td>{{ $product->childCategory->name ?? null }}</td>
                           <td>{{ $product->brand->name ?? null }}</td>
                           <td>{{ $product->attribute->name ?? null }} : @foreach ($product->attrs as  $attr)
                            <span>{{ $attr->attribute->name }}</span>,
                            @endforeach
                            </td>
                            <td>
                                @if ($product->status == 1)
                                    <button class="btn btn-sm btn-primary">Active</button>
                                @elseif($product->status == 0)
                                    <button class="btn btn-sm btn-danger">Deactive</button>
                                @endif
                            </td>
                            <td >
                                <a href="{{ route('product.edit',$product->id) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

                        <!-- text-->
                        <form action="{{ route('product.destroy',$product->id) }}" class="pt-2" id="deteleCategory" method="POST">
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
