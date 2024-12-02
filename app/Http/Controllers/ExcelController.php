<?php

namespace App\Http\Controllers;

use App\Imports\ExcelImport;
use App\Models\Schedule;
use App\Models\Key;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;

use function Laravel\Prompts\table;

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

        if (Schema::hasTable('schedules')) {
            if (DB::table('schedules')->count()) {
                $complete_data = Schedule::all()->toArray();
                foreach ($complete_data as &$value) {
                    $value['names'] = json_decode($value['names'], true);
                    $value['data'] = json_decode($value['data'], true);
                    $value['dates'] = json_decode($value['dates'], true);
                    $value['month'] = json_decode($value['month'], true);
                }
            } else {
                $complete_data[0][0] = 'No data in schedules table';
            }
        } else {
            $complete_data[0][0] = 'No schedules table';
        }

        if (Schema::hasTable('keys')) {
            if (DB::table('keys')->count()) {
                $key = Key::all()->toArray();
                foreach ($key[0] as $k => $v) {
                    $decoded[$k][] = json_decode($v, true);
                }
            } else {
                $key = 'No data in keys table';
            }
        } else {
            $key = 'No keys table';
        }
        return view('s', ['complete_data' => $complete_data[0], 'key' => $key]);
    }
}
