<?php

namespace App\Imports;

use App\Models\Key;
use App\Models\Schedule;
use App\Models\Test;

class ExcelImport
{

    public function import($array)
    {

        $data = [];

        foreach ($array->getAllSheets() as $sheet) {
            $data = $sheet->toArray();
        }

        $flattened = array_merge(...$data);

        if (in_array('сервис инженер', $flattened)) {
            return $this->getSchedule($data);
        } else {
            return $this->getKey($array);
        }

        return $data;
    }

    public function getSchedule(array $array)
    {

        $complete_data = ['names' => [], 'data' => [], 'dates' => [], 'month' => [], 'var1' => [], 'var2' => [], 'var3' => [], 'var4' => [], 'var5' => []];

        $anchor = [];

        foreach ($array as $k => $v) {
            foreach ($v as $v1) {
                if ($v1 == 'сервис инженер') {
                    array_push($anchor, $k);
                    array_push($complete_data['names'], $array[$k][1]);
                }
            }
        }

        if (count($anchor) > 1) {

            array_push($complete_data['dates'], array_filter($array[$anchor[0] - 2])); // Days
            array_push($complete_data['dates'], array_filter($array[$anchor[0] - 1])); // Dates
            array_push($complete_data['month'], $array[1][4]); // Month

            for ($a = 0; $a < count($anchor); $a++) {
                $temp = [];
                for ($i = 0; $i < count($complete_data['dates'][0]); $i++) {

                    $cellValue = $array[$anchor[$a]][$i + 4];

                    if (preg_match('/\p{Cyrillic}/u', $cellValue)) {
                        if (preg_match('/[Оо]/u', $cellValue)) {
                            array_push($temp, 'O');
                        } elseif (preg_match('/[Вв]/u', $cellValue)) {
                            array_push($temp, '-');
                        }
                    } elseif (preg_match('/\p{Latin}/u', $cellValue)) {
                        if (preg_match('/[Oo]/', $cellValue)) {
                            array_push($temp, 'O');
                        } elseif (preg_match('/[Bb]/', $cellValue)) {
                            array_push($temp, '-');
                        }
                    } elseif ($cellValue == '8:00' && $array[$anchor[$a] + 1][$i + 4] == '9:00') {
                        array_push($temp, '+');
                    } elseif ($cellValue == '8:00' && $array[$anchor[$a] + 1][$i + 4] == '12:00') {
                        array_push($temp, 'D');
                    } else {
                        array_push($temp, $cellValue);
                    }
                }
                array_push($complete_data['data'], $temp);
            }

            $dataToStore = [];

            foreach ($complete_data as $key => $value) {
                if (!empty($value)) {
                    $dataToStore[$key] = json_encode($value, JSON_UNESCAPED_UNICODE);
                }
            }

            Schedule::create($dataToStore);

            return $complete_data;
        }
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
