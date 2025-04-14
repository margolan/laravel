<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TripLog extends Model
{

    use SoftDeletes;

    protected $fillable  = [
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
        'archive',
    ];
}
