<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = ['name','description','image','status'];

    private static $category, $image, $imageName, $directory, $imageUrl,$extension;
 
    private static function getImageUrl($request)
    {
     self::$image        = $request->file('image');
     self::$extension    = self::$image->getClientOriginalExtension();
     self::$imageName    = rand(0,500000).time().'.'.self::$extension;
     self::$directory    = "category-images/";
     self::$image->move(self::$directory, self::$imageName);
     self::$imageUrl     = self::$directory.self::$imageName;
        return self::$imageUrl;
    }
 
    public static function newCategory($request)
    {
        self::$imageUrl = $request->file('image') ? self::getImageUrl($request) : ' ';
 
        self::$category = new Category();
        self::saveBasicInfo(self::$category,$request,self::$imageUrl);
    }
 
    public static function updateCategory($request,$id)
    {
         $category = Category::find($id);
        if($request->file('image'))
        {
            if(file_exists($category->image))
            {
                unlink($category->image);
            }
            self::$imageUrl =self::getImageUrl($request);
        }else{
            self::$imageUrl = $category->image;
        }
        self::saveBasicInfo($category,$request,self::$imageUrl);
    }
 
    private static function saveBasicInfo($category,$request,$imageUrl)
    {
 
        $category->name                    = $request->name;
        $category->description             = $request->description;
        $category->image                   = $imageUrl;
        $category->status                  = $request->status;
        $category->save();
    }
 
    public static function deleteCategory($id)
    {
     $category = Category::find($id);
 
        if(file_exists($category->image))
        {
            unlink($category->image);
        }
        $category->delete();
    }
    public function courses()
   {
    return $this->hasMany(Course::class);
   }
   public function subCategories()
   {
    return $this->hasMany(SubCategory::class);
   }
}
