<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentDate extends Model
{
    use HasFactory;
    private static $appointmentDate;
    public static function newAppointmentDate($dates,$id)
    {
        foreach ($dates as $date)
        {
            self::$appointmentDate = new AppointmentDate();
            self::$appointmentDate->appointment_id    = $id;
            self::$appointmentDate->date              = $date;
            self::$appointmentDate->save();
        }
           

    }
    public function date()
    {
        return $this->belongsTo(AppointmentDate::class);
    }
    public static function accept($request)
    {
        self::$appointmentDate = AppointmentDate::find($request->id) ;
        self::$appointmentDate->status = $request->status ?? null;
        self::$appointmentDate->save();
    }
}
