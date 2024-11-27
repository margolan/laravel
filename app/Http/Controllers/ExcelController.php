<?php

namespace App\Http\Controllers;

use App\Imports\ExcelImport;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public $complete_data = ['names' => [], 'data' => [], 'dates' => [], 'month' => [], 'var1' => [], 'var2' => [], 'var3' => [], 'var4' => [], 'var5' => []];

    public function getData(Request $request)
    {

        if ($request->hasFile('file')) {
            $row_data = Excel::toArray(new ExcelImport(), $request->file('file'));

            $anchor = [];

            foreach ($row_data[0] as $k => $v) {
                foreach ($v as $k1 => $v1) {
                    if ($v1 == 'сервис инженер') {
                        array_push($anchor, $k);
                        array_push($this->complete_data['names'], $row_data[0][$k][1]);
                    }
                }
            }

            array_push($this->complete_data['dates'], array_filter($row_data[0][$anchor[0] - 2])); // Days
            array_push($this->complete_data['dates'], array_filter($row_data[0][$anchor[0] - 1])); // Dates
            array_push($this->complete_data['month'], $row_data[0][1][4]); // Month

            for ($a = 0; $a < count($anchor); $a++) {
                $temp = [];
                for ($i = 0; $i < count($this->complete_data['dates'][0]); $i++) {

                    $cellValue = $row_data[0][$anchor[$a]][$i + 4];

                    if (preg_match('/\p{Cyrillic}/u', $cellValue)) {
                        if (preg_match('/[Оо]/u', $cellValue)) {
                            array_push($temp, 'О');
                        } elseif (preg_match('/[Вв]/u', $cellValue)) {
                            array_push($temp, '-');
                        }
                    } elseif (preg_match('/\p{Latin}/u', $cellValue)) {
                        if (preg_match('/[Oo]/', $cellValue)) {
                            array_push($temp, 'O');
                        } elseif (preg_match('/[Bb]/', $cellValue)) {
                            array_push($temp, '-');
                        }
                    } elseif ($cellValue == '8:00' && $row_data[0][$anchor[$a] + 1][$i + 4] == '9:00') {
                        array_push($temp, '+');
                    } elseif ($cellValue == '8:00' && $row_data[0][$anchor[$a] + 1][$i + 4] == '12:00') {
                        array_push($temp, 'Д');
                    } else {
                        array_push($temp, $cellValue);
                    }
                }
                array_push($this->complete_data['data'], $temp);
            }

            $dataToStore = [];

            foreach ($this->complete_data as $key => $value) {
                if (!empty($value)) {
                    $dataToStore[$key] = json_encode($value, JSON_UNESCAPED_UNICODE);
                }
            }

            Schedule::create($dataToStore);

            return view('schedule', ['complete_data' => $this->complete_data, 'row_data' => $row_data, 'dataToStore' => $dataToStore]);
        } else {
            return redirect()->back()->with('error', 'Select File');
        }
    }

    public function show()
    {

        $complete_data = Schedule::where('month', 'like', '%Август%')->get()->toArray();

        foreach ($complete_data as &$value) {
            $value['names'] = json_decode($value['names'], true);
            $value['data'] = json_decode($value['data'], true);
            $value['dates'] = json_decode($value['dates'], true);
            $value['month'] = json_decode($value['month'], true);
        }

        return view('index', ['complete_data' => $complete_data[0]]);
    }
}
