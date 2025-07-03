<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetitionWork extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'title',
        'type',
        'fio_participant',
        'age',
        'city',
        'district_id',
        'organization',
        'fio_curator',
        'file',
        'place'
    ];
}

