<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Models\Product\Brand;
use App\Models\Product\Product;
use App\Models\Product\Attribute;
use App\Http\Controllers\Controller;
use App\Models\Product\AttributeInfo;
use App\Models\Product\ProductAttributeInfo;
use App\Models\Product\ProductSubCategory;

use App\Models\Product\ProductChildCategory;
use App\Models\ProductCategory\ProductCategory;

class ProductController extends Controller
{
    private $subCategories,$childCategories,$attributeInfos;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.product.index',[
            'categories'=>ProductCategory::latest()->get(),
            'subCategories'=>ProductSubCategory::latest()->get(),
            'childCategories'=>ProductChildCategory::latest()->get(),
            'brands'=>Brand::latest()->get(),
            'products'=>Product::latest()->get(),
            'attributes'=>Attribute::latest()->get(),
            'attributeInfos'=>AttributeInfo::latest()->get()

        ]);
    }
    public function getSubCategoryByCategory()
    {
       $this->subCategories = ProductSubCategory::where('product_category_id',$_GET['id'])->get();
        return response()->json($this->subCategories);
    }
    public function getChildCategoryBySubCategory()
    {
       $this->childCategories = ProductChildCategory::where('product_sub_category_id',$_GET['id'])->get();
        return response()->json($this->childCategories);
    }
    public function getAttributeInfoByAttribute()
    {
       $this->attributeInfos = AttributeInfo::where('attribute_id',$_GET['id'])->get();
        return response()->json($this->attributeInfos);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $product = Product::newProduct($request);
        ProductAttributeInfo::newProductAttributeInfo($request->attrs, $product->id);
        return back()->with('message','Product Info save successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.product.product.edit',[
            'product'           => Product::find($id),
            'categories'        => ProductCategory::all(),
            'subCategories'    => ProductSubCategory::all(),
            'childCategories'    => ProductSubCategory::all(),
            'brands'            => Brand::all(),
            'attributes'             => Attribute::all(),
            'attributeInfos'            => AttributeInfo::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Product::updateProduct($request,$id);
        ProductAttributeInfo::updateProductAttributeInfo($request->attrs, $id);
        return back()->with('info','Product info Update Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Product::deleteProduct($id);
        ProductAttributeInfo::deleteProductAttributeInfo($id);
        return back()->with('error','Product Deleted Successfully');
    }
}
