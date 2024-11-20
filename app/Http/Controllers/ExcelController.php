<?php

namespace App\Http\Controllers;

use App\Imports\ExcelImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function getData(Request $request)
    {

        if ($request->hasFile('file')) {
            $row_data = Excel::toArray(new ExcelImport(), $request->file('file'));

            $anchor = [];
            $complete_data = ['names' => [], 'data' => [], 'var1' => [], 'var2' => [], 'var3' => [], 'var4' => [], 'var5' => []];

            foreach ($row_data[0] as $k => $v) {
                foreach ($v as $k1 => $v1) {
                    if ($v1 == 'сервис инженер') {
                        array_push($anchor, $k);
                        array_push($complete_data['names'], $row_data[0][$k][1]);
                    }
                }
            }

            $days = count(array_filter($row_data[0][$anchor[0] - 2]));

            for ($a = 0; $a < count($anchor); $a++) {
                $temp = [];
                for ($i = 0; $i < $days; $i++) {
                    if ($row_data[0][$anchor[$a]][$i + 4] == 'B') {
                        array_push($temp, '-');
                    } else if ($row_data[0][$anchor[$a]][$i + 4] == 'О' || $row_data[0][$anchor[$a]][$i + 4] == null) {
                        array_push($temp, 'О');
                    } else if ($row_data[0][$anchor[$a]][$i + 4] == '8:00' && $row_data[0][$anchor[$a] + 1][$i + 4] == '9:00') {
                        array_push($temp, '+');
                    } else if ($row_data[0][$anchor[$a]][$i + 4] == '8:00' && $row_data[0][$anchor[$a] + 1][$i + 4] == '12:00') {
                        array_push($temp, 'Д');
                    }
                }
                array_push($complete_data['data'], $temp);
            }

            // $lol = explode(';', $complete_data['data'][11]);
            // $lol = [$row_data[0][5], $row_data[0][4]];

            session()->flash('success', 'Excel Imported Successfully');
            return view('schedule', compact('row_data', 'anchor', 'complete_data'));
        } else {
            return redirect()->back()->with('error', 'Select File');
        }
    }

    public function show()
    {
        return view('schedule');
    }
}
