<?php

namespace App\Http\Controllers;

use App\Models\TripLog;
use Illuminate\Http\Request;

class TripLogController extends Controller
{

    public function index()
    {
        $data = TripLog::orderBy('date')->get();

        return view('triplog.trip_log', compact('data'));
    }

    public function edit_show()
    {

        return view('triplog.trip_log_edit');
    }
    public function edit_process(Request $request)
    {

        TripLog::create($request->all());

        $status = 'Данные внесены';

        // $data = $request->all();

        return redirect()->back()->with('status', $status);
        // return redirect()->back()->with('data', $data);
    }
}
