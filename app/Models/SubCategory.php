<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    private static $subCategory, $image,$imageUrl;


   public static function newSubCategory($request)
   {
    self::$imageUrl = $request->file('image') ? imageUpload($request->file('image'),'upload/SubCategory-images/') : ' ';

       self::$subCategory = new SubCategory();
       self::saveBasicInfo(self::$subCategory,$request,self::$imageUrl);
   }

   public static function updateSubCategory($request)
   {
    $subCategory = SubCategory::find($request->id);
       if($request->file('image'))
       {
           if(file_exists($subCategory->image))
           {
               unlink($subCategory->image);
           }
           self::$imageUrl =imageUpload($request->file('image'),'upload/SubCategory-images/');
       }else{
           self::$imageUrl = $subCategory->image;
       }
       self::saveBasicInfo($subCategory,$request,self::$imageUrl);
   }

   private static function saveBasicInfo($subCategory,$request,$imageUrl)
   {
        $subCategory->category_id             = $request->category_id;
        $subCategory->name                    = $request->name;
        $subCategory->image                   = $imageUrl;
        $subCategory->short_details           = $request->short_details;
        $subCategory->long_details	         = $request->long_details;
        $subCategory->service_home            = $request->service_home;
        $subCategory->status                 =isset($request->status);
        $subCategory->save();
   }

   public static function deleteSubCategory($id)
   {
    $subCategory = SubCategory::find($id);

       if(file_exists($subCategory->image))
       {
           unlink($subCategory->image);
       }
       $subCategory->delete();
   }
   public function category()
   {
    return $this->belongsTo(Category::class);
   }
}
