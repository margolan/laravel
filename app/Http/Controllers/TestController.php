<?php

namespace App\Http\Controllers;

use App\Models\TripLog;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToArray;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class TestController extends Controller
{

    public function test(Request $request)
    {

        if ($request->isMethod('get')) {

            $data = TripLog::first()->toArray();

            $spreadsheet = new Spreadsheet();

            $sheet = $spreadsheet->getActiveSheet();

            // return view('test', ['data' => $data]);
        } else {

            return redirect()->back()->with('status', 'Lol');
        }
    }
}
