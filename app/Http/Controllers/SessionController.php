<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function add_session()
    {
        return view('admin.session.session',[
            'sessions'=>Session::get()
        ]);

    }

    public function store_session(Request $request)
    {
        Session::create($request->all());        
        return back()->with('message','Session added successfully');
    }

    public function edit_session($id)
    {
        return view('admin.session.edit_session',[
            'session'=>Session::find($id),
        ]);
    }

    public function update_session(Request $request)
    {   
        $session= Session::find($request->id);
        $session->update($request->all());
        return back()->with('message','Session update successfully');
    }
    public function delete_session(Request $request)
    {   
        $session= Session::find($request->id);
        $session->delete();
        return back()->with('message','Session Delete successfully');
    }
}
