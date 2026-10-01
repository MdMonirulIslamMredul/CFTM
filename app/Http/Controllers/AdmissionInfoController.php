<?php

namespace App\Http\Controllers;

use App\Models\AdmissionInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdmissionInfoController extends Controller
{
    //
    public function add_admission_info()
    {
        return view('admin.appointment.appointment_info',[
            'infos'=>AdmissionInfo::get(),
            'appointment_info'=>DB::table('appointment_infos')->latest()->first(),

        ]);

    }

    public function store_admission_info(Request $request)
    {
        AdmissionInfo::save_appointment_info($request);
        return back()->with('message','Appointment info added successfully');
    }

    public function edit_admission_info($id)
    {
        return view('admin.appointment.appointment_info_edit',[
            'info'=>AdmissionInfo::find($id),
        ]);
    }

    public function update_admission_info(Request $request)
    {
        AdmissionInfo::update_appointment_info($request);
        return back()->with('message','Appointment info update successfully');
    }
}
