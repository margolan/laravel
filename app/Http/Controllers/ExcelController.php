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

        $data = $request->validate(
            [
                'city' => ['required', 'in:aktau,aktobe,atyrau,oral'],
                'month' => ['required', 'integer', 'between:1,12'],
                'year' => ['required', 'integer', 'in:2024,2025,2026'],
                'depart' => ['required', 'in:pos,atm'],
                'file' => ['required', 'mimes:xlsx,xls,csv', 'max:2048'],
            ],
            [
                'city.required' => 'Выберите город',
                'city.in' => 'Выберите город из списка',
                'month.required' => 'Выберите месяц',
                'month.integer' => 'Выберите месяц',
                'month.between' => 'Месяц должен быть в диапазоне от 1 до 12',
                'year.required' => 'Выберите год',
                'year.integer' => 'Выберите год',
                'year.in' => 'Выберите год из списка',
                'depart.required' => 'Выберите отдел',
                'depart.in' => 'Выберите отдел из списка',
            ],

        );

        $spreadsheet = IOFactory::load($request->file('file'));

        $ExcelImport = new ExcelImport();

        $data = $ExcelImport->importTest($spreadsheet);

        return view('test', ['data' => $data]);

        // $data = $request->all();


        return view('test', compact('data'));
        // return view('test', ['data' => $data]);
    }


    public function s_import(Request $request)
    {

        $request->validate(
            [
                'city' => ['required', 'in:aktau,aktobe,atyrau,oral'],
                'month' => ['required', 'integer', 'between:1,12'],
                'year' => ['required', 'integer', 'in:2024,2025,2026'],
                'depart' => ['required', 'in:pos,atm'],
                'file' => ['required', 'mimes:xlsx,xls,csv', 'max:2048'],
            ],
            [
                'city.required' => 'Выберите город',
                'city.in' => 'Выберите город из списка',
                'month.required' => 'Выберите месяц',
                'month.integer' => 'Выберите месяц',
                'month.between' => 'Месяц должен быть в диапазоне от 1 до 12',
                'year.required' => 'Выберите год',
                'year.integer' => 'Выберите год',
                'year.in' => 'Выберите год из списка',
                'depart.required' => 'Выберите отдел',
                'depart.in' => 'Выберите отдел из списка',
            ],
        );

        $spreadsheet = IOFactory::load($request->file('file'));

        $ExcelImport = new ExcelImport();

        $processed_data = $ExcelImport->getSchedule($spreadsheet, $request);



        // $data = $request->all();

        return view('s_import', ['processed_data' => $processed_data]);
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
