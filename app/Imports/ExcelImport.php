<?php

namespace App\Imports;

use App\Models\Key;
use App\Models\Schedule;
use App\Models\Test;
use Maatwebsite\Excel\Concerns\WithLimit;
use Illuminate\Support\Facades\App;


class ExcelImport
{

    public function getSchedulePDF($data, $request)
    {

        $sheet = $data->getActiveSheet();

        function getCellData($cell)
        { // checkin for rich text
            $text = $cell->getValue();
            if ($text instanceof \PhpOffice\PhpSpreadsheet\RichText\RichText) {
                return $text->getPlainText();
            }
            return $text;
        }

        foreach ($sheet->getRowIterator() as $rowIndex => $rowValue) { // checking and collecting anchors by keywords
            $cellIterator = $rowValue->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(true);

            foreach ($cellIterator as $cell) {
                if (getCellData($cell) === 'сервис инженер') {
                    $processed_data['anchor'][] = $rowIndex;
                }
            }
        }

        if (!isset($processed_data['anchor'])) { // return if no anchors found
            return redirect()->back()->with('status', "Сервис инженеры не найдены. Проверьте таблицу на наличие записи 'сервис инженер'");
        }

        foreach ($processed_data['anchor'] as $index => $value) {

            $processed_data['names'][] = getCellData($sheet->getCell('B' . $value));

            $row = $sheet->getRowIterator($value, $value)->current();
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(true);

            $cellIndexCount = 0;

            foreach ($cellIterator as $cellValue) { // processing data
                $cellIndexCount++;
                if ($cellIndexCount > 4 && $cellIndexCount < (cal_days_in_month(CAL_GREGORIAN, $request->month, $request->year) + 5)) {

                    $cellColor = $sheet->getStyle($cellValue->getCoordinate())->getFill()->getStartColor()->getRGB();

                    if (str_contains($cellValue->getValue(), '8:00') && $cellColor === 'FFFFFF') {
                        $processed_data['data'][$index][] = '+';
                    } else if (str_contains($cellValue->getValue(), '8:00') && $cellColor === 'E6B8B8') {
                        $processed_data['data'][$index][] = '+';
                    } else if (str_contains($cellValue->getValue(), '8:00') && $cellColor === 'FFC000') {
                        $processed_data['data'][$index][] = 'D';
                    } else if (preg_match('/\p{Cyrillic}/u', $cellValue) && preg_match('/[Оо]/u', $cellValue)) {
                        $processed_data['data'][$index][] = 'O';
                    } else if (preg_match('/\p{Latin}/u', $cellValue) && preg_match('/[Oo]/u', $cellValue)) {
                        $processed_data['data'][$index][] = 'O';
                    } else if (str_contains($cellValue->getValue(), 'В')) {
                        $processed_data['data'][$index][] = '-';
                    } else {
                        $processed_data['data'][$index][] = $cellColor . ' ' . $cellValue->getValue();
                    }
                }
            }
        }

        for ($i = 0; $i < cal_days_in_month(CAL_GREGORIAN, $request->month, $request->year); $i++) { // numbers and days of the week
            $processed_data['dates']['day'][] = $i + 1;
            $processed_data['dates']['date'][] = __("messages.date" . date('w', mktime(0, 0, 0, $request->month, $i, $request->year)));
        }

        $dataToStore = [];

        foreach ($processed_data as $key => $value) {
            if (!empty($value)) {
                $dataToStore[$key] = json_encode($value, JSON_UNESCAPED_UNICODE);
            }
        }

        $dataToStore['date'] = $request->input('month') . $request->input('year');
        $dataToStore['city'] = $request->input('city');
        $dataToStore['depart'] = $request->input('depart');

        Schedule::create($dataToStore);

        return $processed_data;
    }

    public function getScheduleExcel($data, $request)
    {

        $sheet = $data->getActiveSheet();

        function getCellText($cell)
        { // checkin for rich text
            $text = $cell->getValue();
            if ($text instanceof \PhpOffice\PhpSpreadsheet\RichText\RichText) {
                return $text->getPlainText();
            }
            return $text;
        }

        foreach ($sheet->getRowIterator() as $rowIndex => $rowValue) { // checking and collecting anchors by keywords
            $cellIterator = $rowValue->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(true);

            foreach ($cellIterator as $cell) {
                if (getCellText($cell) === 'сервис инженер') {
                    $processed_data['anchor'][] = $rowIndex;
                }
            }
        }

        if (!isset($processed_data['anchor'])) { // return if no anchors found
            return redirect()->back()->with('status', "Сервис инженеры не найдены. Проверьте таблицу на наличие записи 'сервис инженер'");
        }

        foreach ($processed_data['anchor'] as $index => $value) {

            $processed_data['names'][] = getCellText($sheet->getCell('B' . $value));

            $row = $sheet->getRowIterator($value, $value)->current();
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(true);

            $cellIndexCount = 0;

            foreach ($cellIterator as $cellValue) { // processing data
                $cellIndexCount++;
                if ($cellIndexCount > 4 && $cellIndexCount < (cal_days_in_month(CAL_GREGORIAN, $request->month, $request->year) + 5)) {

                    $cellColor = $sheet->getStyle($cellValue->getCoordinate())->getFill()->getStartColor()->getRGB();

                    if ($cellColor === 'FF0000') {
                        $processed_data['data'][$index][] = 'K';
                    } else if (str_contains($cellValue->getValue(), '=IF')) {
                        $processed_data['data'][$index][] = '+';
                    } else if (str_contains($cellValue->getValue(), '0.33')) {
                        $processed_data['data'][$index][] = 'D';
                    } else if (preg_match('/\p{Cyrillic}/u', $cellValue) && preg_match('/[Оо]/u', $cellValue)) {
                        $processed_data['data'][$index][] = 'O';
                    } else if (preg_match('/\p{Latin}/u', $cellValue) && preg_match('/[Oo]/u', $cellValue)) {
                        $processed_data['data'][$index][] = 'O';
                    } else if (str_contains($cellValue->getValue(), ' ') || str_contains($cellValue->getValue(), null)) {
                        $processed_data['data'][$index][] = '-';
                    } else {
                        $processed_data['data'][$index][] = '[X]';
                    }
                }
            }
        }

        for ($i = 0; $i < cal_days_in_month(CAL_GREGORIAN, $request->month, $request->year); $i++) { // numbers and days of the week
            $processed_data['dates']['day'][] = $i + 1;
            $processed_data['dates']['date'][] = __("messages.date" . date('w', mktime(0, 0, 0, $request->month, $i, $request->year)));
        }

        $dataToStore = [];

        foreach ($processed_data as $key => $value) {
            if (!empty($value)) {
                $dataToStore[$key] = json_encode($value, JSON_UNESCAPED_UNICODE);
            }
        }

        $dataToStore['date'] = $request->input('month') . $request->input('year');
        $dataToStore['city'] = $request->input('city');
        $dataToStore['depart'] = $request->input('depart');

        Schedule::create($dataToStore);

        return $processed_data;
    }

    // public function getSchedulePDF($data, $request)
    // {

    //     $spreadsheet = [];

    //     foreach ($data->getAllSheets() as $sheet) {
    //         $spreadsheet = $sheet->toArray();
    //     }

    //     $processed_data = $spreadsheet;

    //     $processed_data = ['names' => [], 'data' => [], 'dates' => [], 'month' => [], 'var1' => [], 'var2' => [], 'var3' => [], 'var4' => [], 'var5' => []];

    //     $anchor = [];

    //     foreach ($spreadsheet as $k => $v) {
    //         foreach ($v as $v1) {
    //             if ($v1 == 'сервис инженер') {
    //                 array_push($anchor, $k);
    //                 array_push($processed_data['names'], $spreadsheet[$k][1]);
    //             }
    //         }
    //     }

    //     if (empty($anchor)) {
    //         return $dataToStore[] = 'Сервис инженеры не найдены';
    //     }


    //     array_push($processed_data['dates'], array_values(array_filter($spreadsheet[$anchor[0] - 2]))); // Days
    //     array_push($processed_data['dates'], array_values(array_filter($spreadsheet[$anchor[0] - 1]))); // Dates

    //     for ($a = 0; $a < count($anchor); $a++) {
    //         $temp = [];
    //         for ($i = 0; $i < count($processed_data['dates'][0]); $i++) {

    //             $cellValue = $spreadsheet[$anchor[$a]][$i + 4];

    //             if (preg_match('/\p{Cyrillic}/u', $cellValue)) {
    //                 if (preg_match('/[Оо]/u', $cellValue)) {
    //                     array_push($temp, 'O');
    //                 } elseif (preg_match('/[Вв]/u', $cellValue)) {
    //                     array_push($temp, '-');
    //                 }
    //             } elseif (preg_match('/\p{Latin}/u', $cellValue)) {
    //                 if (preg_match('/[Oo]/', $cellValue)) {
    //                     array_push($temp, 'O');
    //                 } elseif (preg_match('/[Bb]/', $cellValue)) {
    //                     array_push($temp, '-');
    //                 }
    //             } elseif ($cellValue == '8:00' && $spreadsheet[$anchor[$a] + 1][$i + 4] == '9:00') {
    //                 array_push($temp, '+');
    //             } elseif ($cellValue == '8:00' && $spreadsheet[$anchor[$a] + 1][$i + 4] == '12:00') {
    //                 array_push($temp, 'D');
    //             } else {
    //                 array_push($temp, $cellValue);
    //             }
    //         }
    //         array_push($processed_data['data'], $temp);
    //     }

    //     $dataToStore = [];

    //     foreach ($processed_data as $key => $value) {
    //         if (!empty($value)) {
    //             $dataToStore[$key] = json_encode($value, JSON_UNESCAPED_UNICODE);
    //         }
    //     }

    //     $dataToStore['date'] = $request->input('month') . $request->input('year');
    //     $dataToStore['city'] = $request->input('city');
    //     $dataToStore['depart'] = $request->input('depart');

    //     // Schedule::create($dataToStore);

    //     return $dataToStore;

    //     // return $processed_data;
    // }

    public function getKey($spreadsheet)
    {

        foreach ($spreadsheet->getAllSheets() as $sheet) {

            $emptyValuesRemoved = array_map(function ($subarray) {
                return array_values(array_filter($subarray, function ($value) {
                    return $value !== null;
                }));
            }, $sheet->toArray());

            $noEmptyValuesArray[$sheet->getTitle()] = $emptyValuesRemoved;
        }

        $i = 1;

        foreach ($noEmptyValuesArray as $city => $data) {
            $dataToInsert['district' . $i] = json_encode([$city => $data], JSON_UNESCAPED_UNICODE);
            $i++;
        }

        $dataToInsert['confirmed'] = 'false';

        Key::create($dataToInsert);

        return $dataToInsert;
    }
}
