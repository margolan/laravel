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

        $data = TripLog::orderBy('created_at', 'desc')->paginate(20);

        $test = '';

        return view('triplog.index', ['data' => $data, 'test' => $test]);
    }

    public function create()
    {

        $todays_orders = TripLog::whereDate('created_at', date('Y-m-d'))->orderBy('created_at')->get();

        if ($todays_orders) {

            $data['from_address'] = $todays_orders->last()->to_address;
        }

        return view('triplog.create', compact('data'));
    }

    public function store(Request $request)
    {

        $data = $request->all();

        $todays_orders = TripLog::whereDate('created_at', date('Y-m-d'))->orderBy('created_at')->get();

        if ($todays_orders) {

            if ($request->start_end_mileage != null) { // Mileage count

                $todays_orders_first = $todays_orders->first();

                if ($todays_orders_first && $todays_orders_first->start_end_mileage != null) {

                    $data['daily_mileage'] = $request->start_end_mileage - $todays_orders_first->start_end_mileage;
                }
            }

            $data['from_address'] = $todays_orders->last()->to_address;
        }

        TripLog::create($data);

        return redirect()->route('max.index')->with('status', 'Данные внесены');
    }

    public function edit($id)
    {

        $data = TripLog::where('id', $id)->first();

        return view('triplog.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
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

        $found_record = TripLog::where('id', $id)->first();

        if ($found_record) {

            foreach ($data as $item) {
                $found_record->$item = $request->$item;
            }

            if ($request->start_end_mileage) { // Mileage count

                $today_first_entry = TripLog::whereDate('created_at', date('Y-m-d'))->orderBy('created_at')->first();

                if ($today_first_entry && $today_first_entry->start_end_mileage != null) {

                    $found_record->daily_mileage = $request->start_end_mileage - $today_first_entry->start_end_mileage;
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
    {
    }
}
