<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompetitionWorkResource;
use App\Models\CompetitionWork as CompetitionWorkModel;
use App\Models\District;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CompetitionWorkController extends Controller
{
    public function allWorks(): AnonymousResourceCollection
    {
        $works = CompetitionWorkModel::query()
            ->paginate(50);
        return CompetitionWorkResource::collection($works);
    }

    public function getWork(CompetitionWorkModel $work): CompetitionWorkResource
    {
        return new CompetitionWorkResource($work);
    }

    /**
     * @return array
     */
    public function getDistricts(): array
    {
        return District::all()->select('id', 'title')->toArray();
    }

    public function getWorksByDistrict(int $district_id): AnonymousResourceCollection
    {
        $works = CompetitionWorkModel::query()
            ->where('district_id', $district_id)
            ->paginate(50);
        return CompetitionWorkResource::collection($works);
    }
}
