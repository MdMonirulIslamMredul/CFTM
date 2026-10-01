<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeInfo extends Model
{
    use HasFactory;
    private static $attributeInfo;

    public static function newAttributeInfo($request)
    {


        self::$attributeInfo = new AttributeInfo();
        self::saveBasicInfo(self::$attributeInfo,$request,);

    }
    public static function updateAttributeInfo($request,$id)
    {
        $attributeInfo = AttributeInfo::find($id);

        self::saveBasicInfo($attributeInfo,$request);
    }
    private static function saveBasicInfo($attributeInfo,$request)
    {

        $attributeInfo->attribute_id              = $request->attribute_id;
        $attributeInfo->name                   = $request->name ??null;
        $attributeInfo->status                    = $request->status ;
        $attributeInfo->save();
    }
    public static function deleteAttributeInfo($id)
    {
        $attribute = AttributeInfo::find($id);
        $attribute->delete();
    }
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
