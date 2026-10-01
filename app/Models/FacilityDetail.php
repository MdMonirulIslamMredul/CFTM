<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityDetail extends Model
{
    use HasFactory;
    private static $facilityDetails, $image,$imageUrl;

    public static function newDetails($request)
    {
        self::$imageUrl = $request->file('image') ? imageUpload($request->file('image'),'upload/Facility-images/') : ' ';

        self::$facilityDetails = new FacilityDetail();

        self::saveBasicInfo(self::$facilityDetails,$request,self::$imageUrl);
    }
    public static function updateDetails($request,$id)
    {
        $facilityDetails = FacilityDetail::find($id);
        if($request->file('image'))
        {
            if(file_exists($facilityDetails->image))
            {
                unlink($facilityDetails->image);
            }
            self::$imageUrl =imageUpload($request->file('image'),'upload/facilityDetails-images/');
        }else{
            self::$imageUrl = $facilityDetails->image;
        }
        self::saveBasicInfo($facilityDetails,$request,self::$imageUrl);


    }
    private static function saveBasicInfo($facilityDetails,$request,$imageUrl)
    {
        $facilityDetails->facility_id             =$request->facility_id;  
        $facilityDetails->title                   = $request->title;
        $facilityDetails->description             = $request->description;
        $facilityDetails->image                   = $imageUrl;
        $facilityDetails->status                  = $request->status;
        $facilityDetails->save();
    }
    public static function deletedetails($id)
    {
        $facilityDetails = FacilityDetail::find($id);
        if(file_exists($facilityDetails->image))
        {
            unlink($facilityDetails->image);
        }
        $facilityDetails->delete();
    }
    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }
}
