<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductChildCategory;
use App\Models\Product\ProductSubCategory;
use App\Models\ProductCategory\ProductCategory;
use Illuminate\Http\Request;

class ProductChildCategoryController extends Controller
{
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

        return view('admin.product.childCategory.childCategory',[
            'categories'=>ProductCategory::latest()->get(),
            'subCategories'=>ProductSubCategory::latest()->get(),
            'childCategories'=>ProductChildCategory::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProductChildCategory::newProductChildCategory($request);
        return back()->with('message','Child Category Created Successfully');
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
        return view('admin.product.childCategory.edit_childCategory',[
            'childCategory'=> ProductChildCategory::find($id),
            'categories'=>ProductCategory::latest()->get(),
            'subCategories'=>ProductSubCategory::latest()->get(),


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
        ProductChildCategory::updateProductChildCategory($request,$id);
        return back()->with('info', 'Child Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductChildCategory::deleteProductChildCategory($id);
        return back()->with('error','Child Category Deleted Successfully');
    }
}
