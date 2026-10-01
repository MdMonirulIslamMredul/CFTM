<?php

namespace App\Http\Controllers;

use App\Models\AdmissionRequire;
use App\Models\Category;
use Illuminate\Http\Request;

class AdmissionRequireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.appointment.admission_req',[
            'categories'=>Category::get(),
            'admission_req'=>AdmissionRequire::get()
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AdmissionRequire::create($request->all());
        return back()->with('message','Admission requirement info created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdmissionRequire  $admissionRequire
     * @return \Illuminate\Http\Response
     */
    public function show(AdmissionRequire $admissionRequire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdmissionRequire  $admissionRequire
     * @return \Illuminate\Http\Response
     */
    public function edit(AdmissionRequire $admissionRequire)
    {
        return view('admin.appointment.admission_req_edit',[
            'info'=>$admissionRequire,
            'categories'=>Category::get(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdmissionRequire  $admissionRequire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdmissionRequire $admissionRequire)
    {
        $admissionRequire->update($request->all());
        return back()->with('message', 'Admission requirement info updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdmissionRequire  $admissionRequire
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdmissionRequire $admissionRequire)
    {
        //
    }
}
