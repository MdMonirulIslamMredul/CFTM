<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public $subCategories;

    public function add_services()
    {
        return view('admin.service.service',[
            'categories'=> Category::get(),
            'subCategories'=>SubCategory::get(),
            'services'=>Course::get()
        ]);

    }
    public function getSubCategoryByCategory()
    {
       $this->subCategories = SubCategory::where('category_id',$_GET['id'])->get();
        return response()->json($this->subCategories);
    }

    public function store_services(Request $request)
    {
        Course::save_service($request);
        return back()->with('message','Course Created successfully');
    }

    public function edit_services($id)
    {
        return view('admin.service.edit_service',[
            'categories'=> Category::get(),
            'subCategories'=>SubCategory::get(),
            'service'=>Course::find($id),
        ]);
    }

    public function update_services(Request $request)
    {


        Course::update_service($request);
        return back()->with('message','Course update successfully');
    }


}