<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    private static $partner, $image,$imageUrl;


    public static function newPartner($request)
    {
     self::$imageUrl = $request->file('image') ? imageUpload($request->file('image'),'upload/partner-images/') : ' ';
 
        self::$partner = new Partner();
        self::saveBasicInfo(self::$partner,$request,self::$imageUrl);
    }
 
    public static function updatePartner($request,$partner)
    {
    
        if($request->file('image'))
        {
            if(file_exists($partner->image))
            {
                unlink($partner->image);
            }
            self::$imageUrl =imageUpload($request->file('image'),'upload/partner-images/');
        }else{
            self::$imageUrl = $partner->image;
        }
        self::saveBasicInfo($partner,$request,self::$imageUrl);
    }
 
    private static function saveBasicInfo($partner,$request,$imageUrl)
    {
         $partner->name                   = $request->name;
         $partner->image                  = $imageUrl;
         $partner->url                    = $request->url;
         $partner->status                 =$request->status;
         $partner->save();
    }
 
    public static function deletePartner($partner)
    {
        if(file_exists($partner->image))
        {
            unlink($partner->image);
        }
        $partner->delete();
    }
}
