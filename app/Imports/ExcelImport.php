<?php

namespace App\Imports;

use App\Models\Key;

class ExcelImport
{

    public function import(array $array)
    {
        $flattened = array_merge(...$array[0]);
        if (in_array('сервис инженер', $flattened)) {
            return $this->getSchedule($array);
        } else {
            return $this->getKey($array);
        }
    }

    public function getSchedule(array $array)
    {

        $complete_data = ['names' => [], 'data' => [], 'dates' => [], 'month' => [], 'var1' => [], 'var2' => [], 'var3' => [], 'var4' => [], 'var5' => []];

        $anchor = [];

        foreach ($array[0] as $k => $v) {
            foreach ($v as $v1) {
                if ($v1 == 'сервис инженер') {
                    array_push($anchor, $k);
                    array_push($complete_data['names'], $array[0][$k][1]);
                }
            }
        }

        if (count($anchor) > 1) {

            array_push($complete_data['dates'], array_filter($array[0][$anchor[0] - 2])); // Days
            array_push($complete_data['dates'], array_filter($array[0][$anchor[0] - 1])); // Dates
            array_push($complete_data['month'], $array[0][1][4]); // Month

            for ($a = 0; $a < count($anchor); $a++) {
                $temp = [];
                for ($i = 0; $i < count($complete_data['dates'][0]); $i++) {

                    $cellValue = $array[0][$anchor[$a]][$i + 4];

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
                    } elseif ($cellValue == '8:00' && $array[0][$anchor[$a] + 1][$i + 4] == '9:00') {
                        array_push($temp, '+');
                    } elseif ($cellValue == '8:00' && $array[0][$anchor[$a] + 1][$i + 4] == '12:00') {
                        array_push($temp, 'Д');
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

            return $complete_data;
        }
    }

    public function getKey(array $array)
    {
        $complete_data = [];

        foreach ($array as $sheet_key => $sheet_value) {
            foreach ($sheet_value as $row) {
                foreach ($row as $index => $value) {
                    if (!empty($value)) {
                        $complete_data['district' . $sheet_key + 1][$index][] = $value;
                    }
                }
            }
        }

        $json_data['confirmed'] = 'false';

        foreach ($complete_data as $key => $value) {
            $json_data[$key] = json_encode($value, JSON_UNESCAPED_UNICODE);
        }

        Key::create($json_data);

        $retrieved_data = Key::all()->last()->toArray();

        return [$complete_data, $retrieved_data];
    }
}
