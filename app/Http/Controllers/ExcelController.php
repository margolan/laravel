<?php

namespace App\Http\Controllers;

use App\Imports\ExcelImport;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use function PHPUnit\Framework\isEmpty;

class ExcelController extends Controller
{
    public $complete_data = ['names' => [], 'data' => [], 'dates' => [], 'month' => '', 'var1' => [], 'var2' => [], 'var3' => [], 'var4' => [], 'var5' => []];

    public function getData(Request $request)
    {

        if ($request->hasFile('file')) {
            $row_data = Excel::toArray(new ExcelImport(), $request->file('file'));

            $anchor = [];
            // $complete_data = ['names' => [], 'data' => ['main' => [], 'correction' => []], 'var1' => [], 'var2' => [], 'var3' => [], 'var4' => [], 'var5' => []]; // for testing purposes
            // $complete_data = ['names' => [], 'data' => [], 'var1' => [], 'var2' => [], 'var3' => [], 'var4' => [], 'var5' => []];

            foreach ($row_data[0] as $k => $v) {
                foreach ($v as $k1 => $v1) {
                    if ($v1 == 'сервис инженер') {
                        array_push($anchor, $k);
                        array_push($this->complete_data['names'], $row_data[0][$k][1]);
                    }
                }
            }

            array_push($this->complete_data['dates'], array_filter($row_data[0][$anchor[0] - 2]));
            array_push($this->complete_data['dates'], array_filter($row_data[0][$anchor[0] - 1]));

            for ($a = 0; $a < count($anchor); $a++) {
                // $temp0 = [[], []]; // for testing purposes
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

                    // array_push($temp0[1], $row_data[0][$anchor[$a] + 1][$i + 4]); // for testing purposes
                    // array_push($temp0[0], $row_data[0][$anchor[$a]][$i + 4]); // for testing purposes
                }
                // array_push($complete_data['data']['main'], $temp0[0]); // for testing purposes
                // array_push($complete_data['data']['correction'], $temp0[1]); // for testing purposes
                array_push($this->complete_data['data'], $temp);
            }

            // $lol = [$row_data[0][5], $row_data[0][4]]; // for testing purposes

            session()->flash('success', 'Excel Imported Successfully');
            return view('schedule', ['complete_data' => $this->complete_data]);
        } else {
            return redirect()->back()->with('error', 'Select File');
        }
    }


    public function write(Request $request)
    {
        $complete_data['data'] = "Any text";
    }

    public function storeData()
    {
        Schedule::create(['names' => $this->complete_data['names']]);
    }

    public function show()
    {
        return view('schedule');
    }
}
