<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{

    protected $fillable = [
        'title',
        'icon',
    ];

    public function experiences()
    {
        return $this->belongsToMany(Experience::class, 'experience_technologies');
    }
}

