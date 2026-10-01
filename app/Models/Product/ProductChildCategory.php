<?php

namespace App\Models\Product;

use App\Models\ProductCategory\ProductCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductChildCategory extends Model
{
    use HasFactory;
    private static $productChildCategory, $image,$imageUrl;

    public static function newProductChildCategory($request)
    {
        self::$imageUrl = $request->file('image') ? imageUpload($request->file('image'),'upload/productChildCategory-imags/') : ' ';

        self::$productChildCategory = new ProductChildCategory();
        self::saveBasicInfo(self::$productChildCategory,$request,self::$imageUrl);

    }
    public static function updateProductChildCategory($request,$id)
    {
        $productChildCategory = ProductChildCategory::find($id);
        if($request->file('image'))
        {
            if(file_exists($productChildCategory->image))
            {
                unlink($productChildCategory->image);
            }
            self::$imageUrl =imageUpload($request->file('image'),'upload/productChildCategory-images/');
        }else{
            self::$imageUrl = $productChildCategory->image;
        }
        self::saveBasicInfo($productChildCategory,$request,self::$imageUrl);
    }
    private static function saveBasicInfo($productChildCategory,$request,$imageUrl)
    {

        $productChildCategory->product_category_id      = $request->product_category_id;
        $productChildCategory->product_sub_category_id  = $request->product_sub_category_id;
        $productChildCategory->name                     = $request->name;
        $productChildCategory->description              = $request->description;
        $productChildCategory->image                    = $imageUrl;
        $productChildCategory->status                   = $request->status;
        $productChildCategory->save();
    }
    public static function deleteProductChildCategory($id)
    {
        $productChildCategory = ProductChildCategory::find($id);
        if(file_exists($productChildCategory->image))
        {
            unlink($productChildCategory->image);
        }
        $productChildCategory->delete();
    }
    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class,'product_category_id','id');
    }
    public function productChildCategory()
    {
        return $this->belongsTo(ProductSubCategory::class,'product_sub_category_id','id');
    }
    
}
