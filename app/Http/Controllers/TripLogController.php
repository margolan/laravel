<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TripLogController extends Controller
{

    public function index()
    {
        return view('triplog.trip_log');
    }

    public function edit(Request $request) {
        return view('triplog.trip_log_edit');
    }
}
