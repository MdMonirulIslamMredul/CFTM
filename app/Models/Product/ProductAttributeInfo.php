<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttributeInfo extends Model
{
    use HasFactory;
    private static $productAttributeInfos,$productAttributeInfo;

    public static function newProductAttributeInfo($attrs,$id)
    {
        foreach ($attrs as $attr)
        {
            self::$productAttributeInfo = new ProductAttributeInfo();
            self::$productAttributeInfo->product_id              = $id;
            self::$productAttributeInfo->attribute_info_id       = $attr;
            self::$productAttributeInfo->save();
        }

    }

    public static function updateProductAttributeInfo($attrs,$id)
        {
            self::$productAttributeInfos = ProductAttributeInfo::where('product_id',$id)->get();
            foreach(self::$productAttributeInfos as $productAttributeInfo)
            {
                $productAttributeInfo->delete();
            }
            self::newProductAttributeInfo($attrs,$id);
        }
    public static function deleteProductAttributeInfo($id)
        {
            self::$productAttributeInfos = ProductAttributeInfo::where('product_id',$id)->get();
            foreach(self::$productAttributeInfos as $productAttributeInfo)
            {
                $productAttributeInfo->delete();
            }
        }
    public function attribute()
    {
        return $this->belongsTo(AttributeInfo::class,'attribute_info_id','id');
    }
}
