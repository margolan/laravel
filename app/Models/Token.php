<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $fillable = [
        'token',
        'used',
        'var1',
        'var2',
        'var3',
    ];
}
