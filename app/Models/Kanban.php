<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kanban extends Model
{
    protected $fillable = [
        'title',
        'text',
        'priority',
        'column', // todo, inprocess, testing, ready
        'author',
        'va1',
        'va2',
        'va3',
    ];
}
