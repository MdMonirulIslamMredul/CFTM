@extends('admin.master')
@section('title')
    Service Edit
@endsection
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('product.update',$product->id)}}" enctype="multipart/form-data" method="POST">
                        @method('put')
                        @csrf

                        <h3>Product page information</h3>
                        <div class="form-group">
                            <label >Category Name</label>
                            <div class="col-md-4">
                                <select class=" form-control" onchange="setSubCategory(this.value)" name="product_category_id">
                                    <option disabled selected >--Select Category--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $product->product_category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                                        <option value="{{ $subCategory->id }}" {{ $product->product_sub_category_id == $subCategory->id ? 'selected' : '' }}>{{ $subCategory->name }}</option>
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
                                        <option value="{{ $childCategory->id }}" {{ $product->product_child_category_id == $childCategory->id ? 'selected' : '' }}>{{ $childCategory->name }}</option>
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
                                        <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
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
                                        <option value="{{ $attribute->id }}" {{ $product->attribute_id == $attribute->id ? 'selected' : '' }}>{{ $attribute->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Attribute  Info</label>
                            <div class="col-md-4">
                                <select class=" form-control select2 rounded-2" id="attributeInfoId" name="attrs[]" multiple>

                                    @foreach ($attributeInfos as $attributeInfo)
                                        <option value="{{ $attributeInfo->id }}"  @foreach($product->attrs as $attr) {{ $attr->attribute_info_id == $attributeInfo->id ? 'selected' : '' }}  @endforeach>{{ $attributeInfo->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control" rows="5" name="name" id="name" value="{{ $product->name }}">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset($product->image) }}" alt="" height="100" width="100">
                        </div>
                        <div class="form-group">
                            <label>Short Description</label>
                            <textarea   class="form-control" col="10" row="30" name="short_description">{{ $product->short_description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Long Description</label>
                            <textarea   class="form-control" col="10" row="30" name="long_description">{{ $product->long_description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Regular Price</label>
                            <input type="number" class="form-control" name="regular_price" value="{{ $product->regular_price }}">
                        </div>
                        <div class="form-group">
                            <label>Selling Price</label>
                            <input type="number" class="form-control" rows="5" name="selling_price" id="name" value="{{ $product->selling_price }}">
                        </div>
                        <div class="form-group">
                            <label>Stock Amount</label>
                            <input type="number" class="form-control"  name="stock_amount" id="name" value="{{ $product->stock_amount }}">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>No</option>
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
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#default'
        });
    </script>
@endsection
