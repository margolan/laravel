<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToArray;

class ExcelImport implements ToArray
{

    public function array(array $array)
    {
        return $array;
    }

    public function getKeys(array $array)
    {
        $data = [];

        foreach ($array[0] as $row) {
            foreach ($row as $index => $value) {
                $data[$index][] = $value;
            }
        }

        return $data;
    }
}
