<?php

namespace App\Imports;

use App\Models\Key;
use App\Models\Schedule;
use App\Models\Test;
use Maatwebsite\Excel\Concerns\WithLimit;

class ExcelImport
{

    public function importTest($request, $data)
    {

        $sheet = $data->getActiveSheet();

        foreach ($sheet->getRowIterator() as $rowIndex => $rowValue) {
            $cellIterator = $rowValue->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(true);
            foreach ($cellIterator as $cell) {
                if ($cell->getValue() === 'сервис инженер') {
                    $processed_data['anchor'][] = $rowIndex;
                }
            }
        }

        if (empty($processed_data['anchor'])) {
            return redirect()->back()->with('error', "Слово 'сервис инженер' не найдено");
        }

        foreach ($processed_data['anchor'] as $index) {
            $processed_data['names'][] = $sheet->getCell('B' . $index)->getValue();
            // foreach()
        }
        $lol = [];
        // $lol = $sheet->getCell('E5')->getValue();
        $lol = cal_days_in_month(CAL_GREGORIAN, $request->month, $request->year);

        // return [$coord, $anchor, $color, $data];
        return [$lol, $processed_data, $data];









        // foreach ($sheet->getRowIterator() as $rowIndex => $rowValue) {
        //     $cellIterator = $rowValue->getCellIterator();

        //     foreach ($cellIterator as $cell) {
        //         if ($cell->getValue() === 'сервис инженер') {
        //             $processed_data['anchor'][] = $rowIndex;
        //             // $style = $sheet->getStyle($cell->getCoordinate());
        //             // $coord = $cell->getValue($cell->getCoordinate());
        //             // $color[] =  $style->getFill()->getStartColor()->getARGB();
        //         }
        //     }
        // }



    }


    public function import($array)
    {



        // $flattened = array_merge(...$data);

        // if (in_array('сервис инженер', $flattened)) {
        //     return $this->getSchedule($data);
        // } else {
        //     return $this->getKey($array);
        // }

        // return $data;
    }

    public function getSchedule($data, $request)
    {

        $spreadsheet = [];

        foreach ($data->getAllSheets() as $sheet) {
            $spreadsheet = $sheet->toArray();
        }

        $processed_data = $spreadsheet;

        // $processed_data = ['names' => [], 'data' => [], 'dates' => [], 'month' => [], 'var1' => [], 'var2' => [], 'var3' => [], 'var4' => [], 'var5' => []];

        // $anchor = [];

        // foreach ($spreadsheet as $k => $v) {
        //     foreach ($v as $v1) {
        //         if ($v1 == 'сервис инженер') {
        //             array_push($anchor, $k);
        //             array_push($processed_data['names'], $spreadsheet[$k][1]);
        //         }
        //     }
        // }

        // if (empty($anchor)) {
        //     return $dataToStore[] = 'Сервис инженеры не найдены';
        // }


        // array_push($processed_data['dates'], array_values(array_filter($spreadsheet[$anchor[0] - 2]))); // Days
        // array_push($processed_data['dates'], array_values(array_filter($spreadsheet[$anchor[0] - 1]))); // Dates

        // for ($a = 0; $a < count($anchor); $a++) {
        //     $temp = [];
        //     for ($i = 0; $i < count($processed_data['dates'][0]); $i++) {

        //         $cellValue = $spreadsheet[$anchor[$a]][$i + 4];

        //         if (preg_match('/\p{Cyrillic}/u', $cellValue)) {
        //             if (preg_match('/[Оо]/u', $cellValue)) {
        //                 array_push($temp, 'O');
        //             } elseif (preg_match('/[Вв]/u', $cellValue)) {
        //                 array_push($temp, '-');
        //             }
        //         } elseif (preg_match('/\p{Latin}/u', $cellValue)) {
        //             if (preg_match('/[Oo]/', $cellValue)) {
        //                 array_push($temp, 'O');
        //             } elseif (preg_match('/[Bb]/', $cellValue)) {
        //                 array_push($temp, '-');
        //             }
        //         } elseif ($cellValue == '8:00' && $spreadsheet[$anchor[$a] + 1][$i + 4] == '9:00') {
        //             array_push($temp, '+');
        //         } elseif ($cellValue == '8:00' && $spreadsheet[$anchor[$a] + 1][$i + 4] == '12:00') {
        //             array_push($temp, 'D');
        //         } else {
        //             array_push($temp, $cellValue);
        //         }
        //     }
        //     array_push($processed_data['data'], $temp);
        // }

        // $dataToStore = [];

        // foreach ($processed_data as $key => $value) {
        //     if (!empty($value)) {
        //         $dataToStore[$key] = json_encode($value, JSON_UNESCAPED_UNICODE);
        //     }
        // }

        // $dataToStore['date'] = $request->input('month') . $request->input('year');
        // $dataToStore['city'] = $request->input('city');
        // $dataToStore['depart'] = $request->input('depart');

        // Schedule::create($dataToStore);

        // return $dataToStore;

        return $processed_data;
    }

    public function getKey($spreadsheet)
    {

        $data = [];

        foreach ($spreadsheet->getAllSheets() as $sheet) {
            $data[$sheet->getTitle()] = $sheet->toArray();
        }

        foreach ($data as $city => $data) {
            foreach ($data as $v) {
                $data_reindexed[$city][0][] = $v[0];
                $data_reindexed[$city][1][] = $v[1];
                $data_reindexed[$city][2][] = $v[2];
            }
        }

        $i = 1;

        foreach ($data_reindexed as $key => $value) {
            $data_to_insert['district' . $i] = json_encode([$key => $value], JSON_UNESCAPED_UNICODE);
            $i++;
        }

        $data_to_insert['confirmed'] = 'false';

        Key::create($data_to_insert);

        return $data_to_insert;
    }
}
