<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    private static $brand, $image,$imageUrl;

    public static function newBrand($request)
    {
        self::$imageUrl = $request->file('image') ? imageUpload($request->file('image'),'upload/brand-images/') : ' ';

        self::$brand = new Brand();
        self::saveBasicInfo(self::$brand,$request,self::$imageUrl);

    }
    public static function updateBrand($request,$id)
    {
        $brand = Brand::find($id);
        if($request->file('image'))
        {
            if(file_exists($brand->image))
            {
                unlink($brand->image);
            }
            self::$imageUrl =imageUpload($request->file('image'),'upload/brand-images/');
        }else{
            self::$imageUrl = $brand->image;
        }
        self::saveBasicInfo($brand,$request,self::$imageUrl);
    }
    private static function saveBasicInfo($brand,$request,$imageUrl)
    {

        $brand->name                    = $request->name;
        $brand->description             = $request->description;
        $brand->image                   = $imageUrl;
        $brand->status                  = $request->status;
        $brand->save();
    }
    public static function deleteBrand($id)
    {
        $brand = Brand::find($id);
        if(file_exists($brand->image))
        {
            unlink($brand->image);
        }
        $brand->delete();
    }
}
