<?php

namespace App\Http\Controllers;

use App\Imports\ExcelImport;
use App\Models\Schedule;
use App\Models\Key;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use PhpOffice\PhpSpreadsheet\IOFactory;

use function Laravel\Prompts\table;

class ExcelController extends Controller
{

    public function getDataTest(Request $request)
    {
        // if ($request->hasFile('file')) {

        //     $spreadsheet = IOFactory::load($request->file('file'));

        //     $xi = new ExcelImport();

        //     $data = $xi->importTest($spreadsheet);

        //     return view('test', ['data' => $data]);
        // } else {
        //     return redirect()->back()->with('error', 'Файл не выбран');
        // }

        $data = $request->all();

        return view('test', compact('data'));
        // return view('test', ['data' => $data]);
    }


    public function getData(Request $request)
    {
        if ($request->hasFile('file')) {

            $spreadsheet = IOFactory::load($request->file('file'));

            $ExcelImport = new ExcelImport();

            $complete_data = $ExcelImport->import($spreadsheet);

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

    public function s_index()
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

        return view('s', ['complete_data' => $complete_data[0]]);
    }

    public function k_index()
    {

        $complete_data = [];

        if (Schema::hasTable('keys')) {
            if (DB::table('keys')->count()) {
                $key = Key::latest()->get()->toArray();
                foreach ($key[0] as $v) {
                    array_push($complete_data, json_decode($v, true));
                }
            } else {
                $complete_data = 'No data in keys table';
            }
        } else {
            $complete_data = 'No keys table';
        }

        return view('k', ['complete_data' => $complete_data]);
    }
}
