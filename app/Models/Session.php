<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $guarded=[];
    // public static $data,$image,$imageName,$directory,$imageUrl;

    // public static function save_session($request)
    // {
    //     self::$data = new Session();
    //     self::$data->name = $request->name??null;
    //     self::$data->price = $request->price??null;
    //     self::$data->options = json_encode($request->options)??null;
    //     self::$data->add_home = $request->add_home??null;
    //     self::$data->save();
    // }
    // public static function update_session($request)
    // {
    //     self::$data = Session::find($request->id);
    //     self::$data->name = $request->name??null;
    //     self::$data->price = $request->price??null;
    //     self::$data->options = json_encode($request->options)??null;
    //     self::$data->add_home = $request->add_home??null;
    //     self::$data->status = $request->status??null;
    //     self::$data->save();
    // }

}
