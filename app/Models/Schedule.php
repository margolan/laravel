<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'names',
        'data',
        'dates',
        'month',
        'date',
        'city',
        'depart',
        'var1',
        'var2',
        'var3'
    ];
}
