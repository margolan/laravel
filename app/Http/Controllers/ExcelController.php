<?php

namespace App\Http\Controllers;

use App\Imports\ExcelImport;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{

    public function getSchedule(Request $request)
    {
        if ($request->hasFile('file')) {

            $data = Excel::toArray(null, $request->file('file'));

            $import = new ExcelImport();

            $complete_data = $import->getSchedule($data);

            return view('import_schedule', compact('complete_data'));
        } else {
            return redirect()->back()->with('error', 'Файл не выбран');
        }
    }

    public function index()
    {

        // $complete_data = Schedule::where('id', '1')->get()->toArray();
        $complete_data = Schedule::all()->toArray();

        if (!empty($complete_data)) {

            foreach ($complete_data as &$value) {
                $value['names'] = json_decode($value['names'], true);
                $value['data'] = json_decode($value['data'], true);
                $value['dates'] = json_decode($value['dates'], true);
                $value['month'] = json_decode($value['month'], true);
            }

            return view('s', ['complete_data' => $complete_data[0]]);
        } else {
            return view('s', ['empty' => 'Nothing to show']);
        }
    }

    public function getKey(Request $request)
    {

        if ($request->hasFile('file')) {

            $data = Excel::toArray(null, $request->file('file'));

            $import = new ExcelImport();

            $lol = $import->getKey($data);

            return view('import_key', compact('lol'));
        } else {
            return redirect()->route('import_key')->with('error', '::Select File');
        }
    }
}
