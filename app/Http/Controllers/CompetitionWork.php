<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompetitionWorkResource;
use App\Models\CompetitionWork as CompetitionWorkModel;

class CompetitionWork extends Controller
{
    public function allWorks()
    {
        return CompetitionWorkResource::collection(CompetitionWorkModel::all());
    }
}
