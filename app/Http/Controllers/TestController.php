<?php

namespace App\Http\Controllers;

use App\Models\TripLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TestController extends Controller
{

    public function test(Request $request)
    {

        return response()->view('test')->withCookie(cookie('myCookie','02jfi2jfi0j23', 60));

    }
}
