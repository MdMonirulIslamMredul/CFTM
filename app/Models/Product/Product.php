<?php

namespace App\Models\Product;

use App\Models\ProductCategory\ProductCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    private static $product, $image,$imageUrl;

    public static function newProduct($request)
    {
        self::$imageUrl = $request->file('image') ? imageUpload($request->file('image'),'upload/product-images/') : ' ';

        self::$product = new Product();
        self::saveBasicInfo(self::$product,$request,self::$imageUrl);
        return self::$product;

    }
    public static function updateProduct($request,$id)
    {
        $product = Product::find($id);
        if($request->file('image'))
        {
            if(file_exists($product->image))
            {
                unlink($product->image);
            }
            self::$imageUrl =imageUpload($request->file('image'),'upload/product-images/');
        }else{
            self::$imageUrl = $product->image;
        }
        self::saveBasicInfo($product,$request,self::$imageUrl);
        return $product;
    }
    private static function saveBasicInfo($product,$request,$imageUrl)
    {

        $product->product_category_id             = $request->product_category_id;
        $product->product_sub_category_id         = $request->product_sub_category_id;
        $product->product_child_category_id         = $request->product_child_category_id;
        $product->brand_id                = $request->brand_id;
        $product->attribute_id                 = $request->attribute_id;
        $product->name                    = $request->name;
        $product->short_description       = $request->short_description;
        $product->long_description        = $request->long_description;
        $product->image                   = $imageUrl;
        $product->regular_price           = $request->regular_price;
        $product->selling_price           = $request->selling_price;
        $product->stock_amount            = $request->stock_amount;
        $product->status                  = $request->status;
        $product->save();
    }
    public static function deleteProduct($id)
    {
        $product = Product::find($id);
        if(file_exists($product->image))
        {
            unlink($product->image);
        }
        $product->delete();
    }
    public function category()
    {
        return $this->belongsTo(ProductCategory::class,'product_category_id','id');
    }
    public function subCategory()
    {
        return $this->belongsTo(ProductSubCategory::class,'product_sub_category_id','id');
    }
    public function childCategory()
    {
        return $this->belongsTo(ProductChildCategory::class,'product_child_category_id','id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function attrs()
    {
        return $this->hasMany(ProductAttributeInfo::class);
    }

}
