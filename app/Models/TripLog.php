<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TripLog extends Model
{
    protected $fillable  = [
        'date',
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
}
