<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmissionInfo extends Model
{
    use HasFactory;
    public static $data;

    public static function save_admission_info($request)
    {
        if($request->id){
            self::$data = AdmissionInfo::find($request->id);
        }
        else{
            self::$data = new AdmissionInfo();
        }
        self::$data->title = $request->title??null;
        self::$data->details1 = $request->details1??null;
        self::$data->details2 = $request->details2??null;
        self::$data->details3 = $request->details3??null;
        self::$data->save();
    }
    public static function update_admission_info($request)
    {
        self::$data = AdmissionInfo::find($request->id);
        self::$data->title = $request->title??null;
        self::$data->details1 = $request->details1??null;
        self::$data->details2 = $request->details2??null;
        self::$data->details3 = $request->details3??null;
        self::$data->save();
    }
    

}
