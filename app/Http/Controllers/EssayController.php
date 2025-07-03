<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompetitionWorkResource;
use App\Models\CompetitionWork;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EssayController extends Controller
{
    public function getAllEssays(): AnonymousResourceCollection
    {
        $works = CompetitionWork::query()
            ->where('type', 'essay')
            ->paginate(50);
        return CompetitionWorkResource::collection($works);
    }

    public function getEssaysByDistrict(int $district_id): AnonymousResourceCollection
    {
        $works = CompetitionWork::query()
            ->where('district_id', $district_id)
            ->where('type', '=', 'essay')
            ->paginate(50);
        return CompetitionWorkResource::collection($works);
    }
}
