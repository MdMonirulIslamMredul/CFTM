<?php

namespace App\Models\ProductCategory;

use App\Models\Product\ProductSubCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    private static $productCategory, $image,$imageUrl;

    public static function newProductCategory($request)
    {
        self::$imageUrl = $request->file('image') ? imageUpload($request->file('image'),'upload/productCategory-images/') : ' ';

        self::$productCategory = new ProductCategory();

        self::saveBasicInfo(self::$productCategory,$request,self::$imageUrl);




    }
    public static function updateProductCategory($request,$id)
    {
        $productCategory = ProductCategory::find($id);
        if($request->file('image'))
        {
            if(file_exists($productCategory->image))
            {
                unlink($productCategory->image);
            }
            self::$imageUrl =imageUpload($request->file('image'),'upload/productCategory-images/');
        }else{
            self::$imageUrl = $productCategory->image;
        }
        self::saveBasicInfo($productCategory,$request,self::$imageUrl);


    }
    private static function saveBasicInfo($productCategory,$request,$imageUrl)
    {

        $productCategory->name                    = $request->name;
        $productCategory->description             = $request->description;
        $productCategory->image                   = $imageUrl;
        $productCategory->status                  = $request->status;
        $productCategory->save();
    }
    public static function deleteProductCategory($id)
    {
        $productCategory = ProductCategory::find($id);
        if(file_exists($productCategory->image))
        {
            unlink($productCategory->image);
        }
        $productCategory->delete();
    }

}
