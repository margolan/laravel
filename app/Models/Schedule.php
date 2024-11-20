<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'names',
        'data',
        'var1',
        'var2',
        'var3',
        'var4',
        'var5'
    ];
}
