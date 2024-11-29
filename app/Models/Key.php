<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    protected $fillable = [
        'district1',
        'district2',
        'district3',
        'district4',
        'district5',
        'district6',
        'confirmed'
    ];
}
