<?php

namespace App\Models\Product;

use App\Models\Category;
use App\Models\ProductCategory\ProductCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    use HasFactory;
    private static $productSubCategory, $image,$imageUrl;

    public static function newProductSubCategory($request)
    {
        self::$imageUrl = $request->file('image') ? imageUpload($request->file('image'),'upload/productSubCategory-imags/') : ' ';

        self::$productSubCategory = new ProductSubCategory();
        self::saveBasicInfo(self::$productSubCategory,$request,self::$imageUrl);

    }
    public static function updateProductSubCategory($request,$id)
    {
        $productSubCategory = ProductSubCategory::find($id);
        if($request->file('image'))
        {
            if(file_exists($productSubCategory->image))
            {
                unlink($productSubCategory->image);
            }
            self::$imageUrl =imageUpload($request->file('image'),'upload/productSubCategory-images/');
        }else{
            self::$imageUrl = $productSubCategory->image;
        }
        self::saveBasicInfo($productSubCategory,$request,self::$imageUrl);
    }
    private static function saveBasicInfo($productSubCategory,$request,$imageUrl)
    {

        $productSubCategory->product_category_id     = $request->product_category_id;
        $productSubCategory->name                    = $request->name;
        $productSubCategory->description             = $request->description;
        $productSubCategory->image                   = $imageUrl;
        $productSubCategory->status                  = $request->status;
        $productSubCategory->save();
    }
    public static function deleteProductSubCategory($id)
    {
        $productSubCategory = ProductSubCategory::find($id);
        if(file_exists($productSubCategory->image))
        {
            unlink($productSubCategory->image);
        }
        $productSubCategory->delete();
    }
    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }
   
}
