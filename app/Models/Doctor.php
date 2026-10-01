<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    public static $data,$image,$imageName,$directory,$imageUrl;

    public static function save_doctor($request)
    {
        self::$data = new Doctor();
        self::$data->name = $request->name??null;
        self::$data->designation = $request->designation??null;
        self::$data->email = $request->email??null;
        self::$data->phone = $request->phone??null;
        self::$data->password = $request->password??null;
        self::$data->service_id = $request->service_id??null;
        self::$data->add_home = $request->add_home??null;
        self::$data->image = self::saveImage($request);
        self::$data->save();
    }
    public static function update_doctor($request)
    {
        self::$data = Doctor::find($request->id);
        self::$data->name = $request->name??null;
        self::$data->designation = $request->designation??null;
        self::$data->email = $request->email??null;
        self::$data->phone = $request->phone??null;
        self::$data->password = $request->password??null;
        self::$data->service_id = $request->service_id??null;
        self::$data->add_home = $request->add_home??null;
        self::$data->status = $request->status??null;
        if($request->file('image')){
            if(self::$data->image){
                if(file_exists(self::$data->image)){
                    unlink(self::$data->image);
                    self::$data->image = self::saveImage($request);
                }
            }
            else{
                self::$data->image = self::saveImage($request);
            }
        }
        self::$data->save();
    }

    private static function saveImage($request){
        self::$image = $request->file('image');
        self::$imageName = 'doctor-'.rand().'.'. self::$image->Extension();
        self::$directory = 'doctor/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
    public function services()
    {
        return $this->hasMany(Service::class);
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
   
}
