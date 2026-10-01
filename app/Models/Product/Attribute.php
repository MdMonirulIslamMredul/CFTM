<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    private static $attribute;

    public static function newAttribute($request)
    {
       

        self::$attribute = new attribute();
        self::saveBasicInfo(self::$attribute,$request,);

    }
    public static function updateAttribute($request,$id)
    {
        $attribute = attribute::find($id);
       
        self::saveBasicInfo($attribute,$request,);
    }
    private static function saveBasicInfo($attribute,$request)
    {

        $attribute->name                    = $request->name;
        $attribute->status                  = $request->status;
        $attribute->save();
    }
    public static function deleteAttribute($id)
    {
        $attribute = attribute::find($id);
        $attribute->delete();
    }
}
