<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    private static $result, $file,$fileUrl;


   public static function newResult($request)
   {
    self::$fileUrl = $request->file('file') ? fileUpload($request->file('file'),'upload/result-files/') : ' ';

       self::$result = new Result();
       self::saveBasicInfo(self::$result,$request,self::$fileUrl);
   }

   public static function updateResult($request,$result)
   {
   
       if($request->file('file'))
       {
           if(file_exists($result->file))
           {
               unlink($result->file);
           }
           self::$fileUrl =fileUpload($request->file('file'),'upload/result-files/');
       }else{
           self::$fileUrl = $result->file;
       }
       self::saveBasicInfo($result,$request,self::$fileUrl);
   }

   private static function saveBasicInfo($result,$request,$fileUrl)
   {
        $result->course_id              = $request->course_id;
        $result->session_id             = $request->session_id;
        $result->file                   = $fileUrl;
        $result->student_id             = $request->student_id;
        $result->status                 =$request->status;
        $result->save();
   }

   public static function deleteResult($result)
   {
       if(file_exists($result->file))
       {
           unlink($result->file);
       }
       $result->delete();
   }
   public function subCategory()
   {
    return $this->belongsTo(subCategory::class,'course_id','id');
   }
}
