<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function submit(Request $request)
    {
        // return $request;
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'position' => 'required|string',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            
        ]);

        $cvPath = fileUpload($request->file('cv'),'upload/Cv/');

        Career::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'position' => $request->position,
            'cv_path' => $cvPath,
            // 'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Your career application has been submitted successfully.');
    }
}
