<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TripLogController extends Controller
{

    public function index()
    {
        return view('triplog.trip_log');
    }

    public function edit_show()
    {

        return view('triplog.trip_log_edit');
    }
    public function edit_process(Request $request)
    {

        $data = $request->all();

        return redirect()->back()->with('data', $data);
    }
}
