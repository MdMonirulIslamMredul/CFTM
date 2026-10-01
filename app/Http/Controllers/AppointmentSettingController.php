<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\AppointmentDate;
use App\Models\Category;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AppointmentSettingController extends Controller
{
   
    public function tech_web_add_appointment_setting()
    {
        return view('admin.service_order.order_setting',[
            'user'=>User::find(auth()->user()->id),
            'doctor'=>Doctor::get(),
            'infos'=>Appointment::latest()->get(),
            'service'=>Service::get(),
            
        ]);

    }
    public function tech_web_check_status()
    {
        return view('admin.service_order.order_status',[
            'infos'=>Appointment::latest()->get(),
            'dates'=>AppointmentDate::get()
        ]);
    }
    public function tech_web_approve_service_order($id)
    {
        return view('admin.service_order.asign_doctor',[
            'info'=>Appointment::find($id),
            'service'=>Service::get(),
            'doctors'=>Doctor::get(), 
            'dates' =>AppointmentDate::get()
            
        ]);
        
    }
    public function tech_web_approve_order_details($id)
    {
        return view('admin.service_order.order_details',[
            'info'=>Appointment::find($id),
            'dates'=>AppointmentDate::get()
        ]);
        

    }
    public function tech_web_update_info(Request $request)
    {
        Appointment::update_appointment($request);
        return redirect()->route('add.appointment.setting')->with('message','Doctor Asign successfully');
    }
    public function tech_web_accept(Request $request)
    {
        // dd($request->all());
        Appointment::accept($request);
        Alert::toast('Update successfully', 'success');
        return redirect()->route('add.appointment.setting');
    }
    public function tech_web_more_date(Request $request,$id)
    {
        // dd($request->all());
        $appointment = Appointment::find($id);
        AppointmentDate::newAppointmentDate($request->dates, $appointment->id);
        return back()->with('message','Date Added successfully');
    }
    public function tech_web_approve_extend($id)
    {

        return view('admin.service_order.extend_date',[
            'date'=>AppointmentDate::find($id)
        ]);
    }
    public function tech_web_approve_extend_date(Request $request)
    {
        // dd($request->all);
        AppointmentDate::accept($request);
        Alert::toast('Update successfully', 'success');
        return back();
    }

}
