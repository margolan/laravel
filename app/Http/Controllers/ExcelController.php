<?php

namespace App\Http\Controllers;

use App\Imports\ExcelImport;
use App\Models\Schedule;
use App\Models\Key;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;

class ExcelController extends Controller
{

    public function getDataTest(Request $request)
    {

        if ($request->isMethod('get')) {

            $processed_data['request'] = $request->all();

            return view('test', ['processed_data' => $processed_data]);
        }
    }


    public function s_delete(Request $request)
    {

        $record = Schedule::find($request->id);

        if ($record) {

            if ($record->city === Auth::user()->city || Auth::user()->role == 'admin') {
                if ($record->depart === Auth::user()->depart || Auth::user()->role == 'admin') {
                    $record->delete();
                    return redirect()->route('admin_index')->with('status', 'Запись успешно удалена');
                } else {
                    return redirect()->route('admin_index')->with('status', 'Нельзя удалить запись другого подразделения');
                }
            } else {
                return redirect()->route('admin_index')->with('status', 'Нельзя удалить запись другого города');
            }
        } else {

            return redirect()->route('admin_index')->with('status', 'Таблица не найдена');
        }
    }

    public function k_delete(Request $request)
    {
        $record = Key::find($request->id);
        if ($record) {
            $record->delete();
            return redirect()->route('admin_index')->with('status', 'Запись успешно удалена');
        } else {
            return redirect()->route('admin_index')->with('status', 'Таблица не найдена');
        }
    }

    public function s_import(Request $request)
    {

        // $validated_data = $request->validate(
        //     [
        //         'city' => ['required', 'in:aktau,aktobe,atyrau,oral'],
        //         'month' => ['required', 'in:01,02,03,04,05,06,07,08,09,10,11,12'],
        //         'year' => ['required', 'in:2024,2025,2026'],
        //         'depart' => ['required', 'in:pos,atm'],
        //         // 'file' => ['required', 'mimes:xlsx,xls,csv'],
        //     ],
        //     [
        //         'city.required' => 'Выберите город',
        //         'city.in' => 'Выберите город из списка',
        //         'month.required' => 'Выберите месяц',
        //         'month.in' => 'Месяц должен быть в диапазоне от 1 до 12',
        //         'year.required' => 'Выберите год',
        //         'year.in' => 'Выберите год из списка',
        //         'depart.required' => 'Выберите отдел',
        //         'depart.in' => 'Выберите отдел из списка',
        //         'file' => 'Выберите файл',
        //     ],
        // );


        $spreadsheet = IOFactory::load($request->file('file'));

        $ExcelImport = new ExcelImport();

        if ($request->excel == 'on') {
            $processed_data = $ExcelImport->getScheduleExcel($spreadsheet, $request);
        } else {
            $processed_data = $ExcelImport->getSchedulePDF($spreadsheet, $request);
        }

        return redirect()->route('admin_index')->with('processed_data', $processed_data)->with('status', 'Запись успешно добавлена');
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

        return redirect()->route('admin_index')->with('processed_data', $processed_data)->with('status', 'Запись успешно добавлена');
    }

    public function k_index(Request $request)
    {

        $pincode = User::where('name', 'pincode')->first()->password;

        $cookie = Cookie::get('pincode');

        if ($cookie != $pincode) {

            Cookie::expire('pincode');

            return redirect()->route('auth_pincode')->with('status', 'Вы не авторизованы.');
        }

        $processed_data = [];

        if (Schema::hasTable('keys')) {

            $available_links = Key::select('created_at', 'id')->get();

            if (DB::table('keys')->count()) {

                $query = Key::query();

                if (!empty($request->id)) {

                    $query->where('id', $request->id);

                    $key = $query->get()->toArray();

                    $key = $key[0];
                } else {

                    $key = $query->latest('created_at')->first()->toArray();
                }

                $processed_data = [];

                foreach (['district1', 'district2', 'district3', 'district4', 'district5', 'district6'] as $district) {
                    if (isset($key[$district])) {
                        $processed_data = array_merge($processed_data, json_decode($key[$district], true));
                    }
                }
            }
        }

        // Test!

        $test = Cookie::get();


        // Test!

        return view('k', ['processed_data' => $processed_data, 'available_links' => $available_links, 'test' => $test]);
    }
}
