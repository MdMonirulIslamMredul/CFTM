<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function add_doctor()
    {
        return view('admin.doctor.doctor',[
            'doctors'=>Doctor::get(),
            'services'=>Service::get()
        ]);

    }

    public function store_doctor(Request $request)
    {
        //dd($request->all());
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => '2',
            'password' => Hash::make($request->password),
        ]);
        Doctor::save_doctor($request);
        return back()->with('message','Doctor added successfully');
    }

    public function edit_doctor($id)
    {
        return view('admin.doctor.edit_doctor',[
            'doctor'=>Doctor::find($id),
            'services'=>Service::get()
        ]);
    }

    public function update_doctor(Request $request)
    {
        Doctor::update_doctor($request);
        return back()->with('message','Doctor update successfully');
    }
}
