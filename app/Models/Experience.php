<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'position',
        'short_description',
        'date_from',
        'date_to',
        'company_name',
    ];
    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'experience_technologies');
    }

}
