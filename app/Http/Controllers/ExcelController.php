<?php

namespace App\Http\Controllers;

use App\Imports\ExcelImport;
use App\Models\Schedule;
use App\Models\Key;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{

    public function getData(Request $request)
    {
        if ($request->hasFile('file')) {

            $data = Excel::toArray(null, $request->file('file'));

            $ExcelImport = new ExcelImport();

            $complete_data = $ExcelImport->import($data);

            return view('import', compact('complete_data'));
        } else {
            return redirect()->back()->with('error', 'Файл не выбран');
        }
    }

    public function confirmData(Request $request)
    {

        $lol = $request->get('id');

        return view('import', compact('lol'));
    }

    public function index()
    {

        // $complete_data = Schedule::where('id', '1')->get()->toArray();
        $complete_data = Schedule::all()->toArray();
        $lol = Key::all()->last()->toArray();

        foreach ($lol as $k => $v) {
            $decoded[$k][] = json_decode($v, true);
        }


        if (!empty($complete_data)) {

            foreach ($complete_data as &$value) {
                $value['names'] = json_decode($value['names'], true);
                $value['data'] = json_decode($value['data'], true);
                $value['dates'] = json_decode($value['dates'], true);
                $value['month'] = json_decode($value['month'], true);
            }

            return view('s', ['complete_data' => $complete_data[0], 'lol' => $decoded]);
        } else {
            return view('s', ['empty' => 'Nothing to show']);
        }
    }
}
