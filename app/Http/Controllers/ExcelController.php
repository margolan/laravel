<?php

namespace App\Http\Controllers;

use App\Imports\ExcelImport;
use App\Models\Schedule;
use App\Models\Key;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
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

        if (!Schema::hasTable('schedules')) {
            Artisan::call('migrate', ['--force' => true]);
        }

        // $complete_data = Schedule::where('id', '1')->get()->toArray();
        $complete_data = Schedule::all()->toArray();

        if (DB::table('keys')->count()) {
            $key = Key::all()->toArray();
            foreach ($key as $k => $v) {
                $decoded[$k][] = json_decode($v, true);
            }
        } else {
            $key = 'No keys in table';
        }

        if (!empty($complete_data)) {

            foreach ($complete_data as &$value) {
                $value['names'] = json_decode($value['names'], true);
                $value['data'] = json_decode($value['data'], true);
                $value['dates'] = json_decode($value['dates'], true);
                $value['month'] = json_decode($value['month'], true);
            }

            return view('s', ['complete_data' => $complete_data[0], 'key' => $decoded]);
        } else {
            return view('s', ['empty' => 'Nothing to show']);
        }
    }
}
