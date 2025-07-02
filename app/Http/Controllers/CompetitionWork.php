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

    public function getWork(CompetitionWorkModel $work): CompetitionWorkResource
    {
        return new CompetitionWorkResource($work);
    }

    public function getAllPaintings(): AnonymousResourceCollection
    {
        $works = CompetitionWorkModel::query()
            ->where('type', 'painting')
            ->paginate(50);
        return CompetitionWorkResource::collection($works);
    }

    public function getAllResearches(): AnonymousResourceCollection
    {
        $works = CompetitionWorkModel::query()
            ->where('type', 'research')
            ->paginate(50);
        return CompetitionWorkResource::collection($works);
    }

    public function getAllEssays(): AnonymousResourceCollection
    {
        $works = CompetitionWorkModel::query()
            ->where('type', 'essay')
            ->paginate(50);
        return CompetitionWorkResource::collection($works);
    }
}
