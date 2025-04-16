<?php

namespace App\Http\Controllers;

use App\Models\TripLog;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TestController extends Controller
{

    public function test(Request $request)
    {

        if ($request->isMethod('get')) {

            $data = TripLog::get();

            $spreadsheet = new Spreadsheet();

            $sheet = $spreadsheet->getActiveSheet();

            $headers = [
                'Дата',
                '№ заявки',
                'Откуда',
                'Куда',
                'Цель поездки',
                'Результат',
                'Начальный/конечный километраж',
                'Пробег за день',
                'Заправка (литры)',
                'Платные парковки',
                'Пробег на момент заправки'
            ];

            $db_cols = [
                'order_number',
                'from_address',
                'to_address',
                'trip_purpose',
                'trip_result',
                'start_end_mileage',
                'daily_mileage',
                'fuel_amount',
                'parking_fee',
                'mileage_at_fueling',
            ];

            $col = "A";

            foreach ($headers as $item) {
                $sheet->setCellValue($col . '1', $item);
                $col++;
            }

            $key = 2;

            for ($a = 0; $a < count($data); $a++) {
                $col = "B";
                $sheet->setCellValue('A' . $key, $data[0]['created_at']->format('d.m.Y'));
                foreach ($db_cols as $item) {
                    $sheet->setCellValue($col . $key, $data[$a][$item]);
                    $col++;
                }
                $key++;
            }


            // $sheet = $data[0]['created_at']->format('d.m.Y');

            // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            // header('Content-Disposition: attachment;filename="document.xlsx"');
            // header('Cache-Control: max-age=0');

            // $writer = new Xlsx($spreadsheet);
            // $writer->save('php://output');
            // exit;

            return view('test', ['data' => $sheet->toArray()]);
        } else {

            return redirect()->back()->with('status', 'Lol');
        }
    }
}
