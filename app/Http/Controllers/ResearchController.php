<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompetitionWorkResource;
use App\Models\CompetitionWork;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ResearchController extends Controller
{
    public function getAllResearches(): AnonymousResourceCollection
    {
        $works = CompetitionWork::query()
            ->where('type', 'research')
            ->paginate(50);
        return CompetitionWorkResource::collection($works);
    }

    public function getResearchesByDistrict(int $district_id): AnonymousResourceCollection
    {
        $works = CompetitionWork::query()
            ->where('district_id', $district_id)
            ->where('type', '=', 'research')
            ->paginate(50);
        return CompetitionWorkResource::collection($works);
    }
}
