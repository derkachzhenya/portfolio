<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'title',
        'qualification',
        'program_name',
        'date_from',
        'date_to',
    ];
}
