<?php

namespace App\Http\Controllers;

use App\Imports\ExcelImport;
use App\Models\Schedule;
use App\Models\Key;
use App\Models\Test;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Auth;

class ExcelController extends Controller
{

    public function getDataTest(Request $request)
    {

        $requests = $request->all();

        $query = Schedule::query();

        foreach ($request->all() as $column => $value) {
            $query->where($column, $value);
        }

        $data = $query->orderby('date', 'desc')->get()->toArray();

        // $data = $query->get()->toArray();

        $available_links = Schedule::select('city', 'date')->get();

        return view('test', ['data' => $data, 'available_links' => $available_links, 'requests' => $requests]);
    }


    public function s_delete(Request $request)
    {
        if (Auth::check()) {
            $record = Schedule::find($request->id);
            if ($record) {
                $record->delete();
                return redirect()->back()->with('status', 'Запись успешно удалена');
            } else {
                return redirect()->back()->with('status', 'Таблица не найдена');
            }
        } else {
            return redirect()->back()->with('status', 'Вы не авторизованы для подобных действий');
        }
    }

    public function k_delete(Request $request)
    {
        if (Auth::check()) {
            $record = Key::find($request->id);
            if ($record) {
                $record->delete();
                return redirect()->back()->with('status', 'Запись успешно удалена');
            }
        } else {
            return redirect()->back()->with('status', 'Вы не авторизованы для подобных действий');
        }
    }

    public function s_import(Request $request)
    {

        $request->validate(
            [
                'city' => ['required', 'in:aktau,aktobe,atyrau,oral'],
                'month' => ['required', 'in:01,02,03,04,05,06,07,08,09,10,11,12'],
                'year' => ['required', 'in:2024,2025,2026'],
                'depart' => ['required', 'in:pos,atm'],
                'file' => ['required', 'mimes:xlsx,xls,csv', 'max:2048'],
            ],
            [
                'city.required' => 'Выберите город',
                'city.in' => 'Выберите город из списка',
                'month.required' => 'Выберите месяц',
                'month.in' => 'Месяц должен быть в диапазоне от 1 до 12',
                'year.required' => 'Выберите год',
                'year.in' => 'Выберите год из списка',
                'depart.required' => 'Выберите отдел',
                'depart.in' => 'Выберите отдел из списка',
            ],
        );

        $spreadsheet = IOFactory::load($request->file('file'));

        $ExcelImport = new ExcelImport();

        $processed_data = $ExcelImport->getSchedule($spreadsheet, $request);
        // $processed_data = $ExcelImport->importTest($request, $spreadsheet);

        return view('s_import', ['processed_data' => $processed_data]);
        // return view('test', ['processed_data' => $processed_data]);
    }

    public function s_index(Request $request)
    {

        $processed_data = [];

        if (Schema::hasTable('schedules')) {

            $available_links = Schedule::select('city', 'date')->distinct()->orderby('city', 'asc')->orderby('date', 'asc')->get()->groupBy('city');

            if (DB::table('schedules')->count()) {

                $query = Schedule::query();

                if (!empty($request->all())) {
                    foreach ($request->all() as $column => $value) {
                        $query->where($column, $value);
                    }
                    $processed_data = $query->orderby('date', 'desc')->get()->toArray();
                } else {
                    $current_month_year = date('mY');
                    $processed_data = $query->where('city', 'aktobe')->where('date', $current_month_year)->get()->toArray();
                }

                foreach ($processed_data as &$value) {
                    $value['names'] = json_decode($value['names'], true);
                    $value['data'] = json_decode($value['data'], true);
                    $value['dates'] = json_decode($value['dates'], true);
                }
            }
        }


        return view('s', ['processed_data' => $processed_data, 'available_links' => $available_links]);
    }

    public function k_import(Request $request)
    {

        $request->validate(
            [
                'file' => ['required', 'mimes:xlsx,xls,csv', 'max:2048'],
            ],
        );

        $spreadsheet = IOFactory::load($request->file('file'));

        $ExcelImport = new ExcelImport();

        $processed_data = $ExcelImport->getKey($spreadsheet, $request);

        return view('k_import', ['processed_data' => $processed_data]);
    }

    public function k_index(Request $request)
    {

        $processed_data = [];

        if (Schema::hasTable('keys')) {

            $available_links = Key::select('created_at', 'id')->get();

            if (DB::table('keys')->count()) {

                $query = Key::query();

                if (!empty($request->all())) {

                    $query->where('id', $request->input('id'));

                    $key = $query->get()->toArray();
                } else {

                    $key[0] = $query->latest('created_at')->first()->toArray();
                }

                foreach ($key[0] as $v) {
                    array_push($processed_data, json_decode($v, true));
                }
            }
        }

        return view('k', ['processed_data' => $processed_data, 'available_links' => $available_links]);
    }
}
