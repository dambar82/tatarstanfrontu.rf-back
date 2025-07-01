<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompetitionWorkResource;
use App\Models\CompetitionWork as CompetitionWorkModel;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CompetitionWork extends Controller
{
    public function allWorks(): AnonymousResourceCollection
    {
        $works = CompetitionWorkModel::query()
            ->paginate(50);
        return CompetitionWorkResource::collection($works);
    }
}
