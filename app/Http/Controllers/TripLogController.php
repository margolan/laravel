<?php

namespace App\Http\Controllers;

use App\Models\TripLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

use function PHPUnit\Framework\returnSelf;

class TripLogController extends Controller
{

    public function index()
    {
        $data = TripLog::orderBy('created_at')->get();

        // $data = TripLog::orderBy('date')->orderBy('created_at')->cursorPaginate(3);

        $test = '';

        return view('triplog.index', ['data' => $data, 'test' => $test]);
    }

    public function create()
    {

        return view('triplog.create');
    }

    public function store(Request $request)
    {

        $data = $request->all();

        if ($request->start_end_mileage != null) {

            $today_first_entry = TripLog::whereDate('created_at', date('Y-m-d'))->orderBy('created_at')->first();

            if ($today_first_entry && $today_first_entry->start_end_mileage != null) {

                $data['daily_mileage'] = $request->start_end_mileage - $today_first_entry->start_end_mileage;
            }
        }

        TripLog::create($data);

        return redirect()->route('max.index')->with('status', 'Данные внесены');
    }

    public function edit($order_number)
    {

        $data = TripLog::where('order_number', $order_number)->first();

        return view('triplog.edit', ['data' => $data]);
    }

    public function update(Request $request, $order_hidden)
    {

        $data = [
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
            'archive'
        ];

        $found_record = TripLog::where('order_number', $order_hidden)->first();

        if ($found_record) {

            foreach ($data as $item) {
                $found_record->$item = $request->$item;
            }

            if ($request->start_end_mileage) {

                $first_record = TripLog::where('created_at', $request->created_at)->orderBy('created_at')->first();

                if ($first_record && $first_record->start_end_mileage != null) {

                    $found_record->daily_mileage = $request->start_end_mileage - $first_record->start_end_mileage;
                }
            }

            $found_record->save();
        } else {

            return redirect()->route('max.index')->with('status', 'Запись не найдена');
        }

        return redirect()->route('max.index')->with('status', 'Изменения приняты');
    }
    public function destroy($id)
    {

        $entry = TripLog::findOrFail($id);

        $entry->delete();

        return redirect()->route('max.index')->with('status', "Запись удалена");
    }
    public function show($id)
    { /* показать одну запись */
    }





    // public function index()
    // {
    //     $data = TripLog::orderBy('date')->orderBy('created_at')->get();
    //     // $data = TripLog::orderBy('date')->orderBy('created_at')->cursorPaginate(3);

    //     $test = '';

    //     return view('triplog.index', ['data' => $data, 'test' => $test]);
    // }
    // public function edit(Request $request)
    // {

    //     $data = [
    //         'date',
    //         'order_number',
    //         'from_address',
    //         'to_address',
    //         'trip_purpose',
    //         'trip_result',
    //         'start_end_mileage',
    //         'daily_mileage',
    //         'fuel_amount',
    //         'parking_fee',
    //         'mileage_at_fueling',
    //     ];

    //     $found_record = TripLog::where('order_number', $request->order_hidden)->first();

    //     if ($found_record) {

    //         foreach ($data as $item) {
    //             $found_record->$item = $request->$item;
    //         }

    //         if ($request->start_end_mileage) {

    //             $first_record = TripLog::where('date', $request->date)->orderBy('created_at')->first();

    //             if ($first_record && $first_record->start_end_mileage != null) {

    //                 $found_record->daily_mileage = $request->start_end_mileage - $first_record->start_end_mileage;
    //             }
    //         }

    //         $found_record->save();
    //     } else {

    //         return redirect()->back()->with('status', 'Запись не найдена');
    //     }

    //     return redirect()->back()->with('status', 'Изменения приняты');
    //     // return redirect()->back()->with('test', $test);
    // }

    // public function add_show()
    // {

    //     return view('triplog.add');
    // }
    // public function add_process(Request $request)
    // {

    //     TripLog::create($request->all());

    //     $status = 'Данные внесены';

    //     return redirect()->back()->with('status', $status);
    // }
}
