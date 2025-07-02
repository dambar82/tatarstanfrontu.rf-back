<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class District extends Model
{
    use HasFactory;
    protected $table = 'districts';

    protected $fillable = [
        'title'
    ];

    public function work(): HasOne
    {
        return $this->hasOne(CompetitionWork::class, 'districts_id', 'id');
    }
}
