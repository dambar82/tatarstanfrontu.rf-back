<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompetitionWorkResource;
use App\Models\CompetitionWork;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PaintingController extends Controller
{
    public function getAllPaintings(): AnonymousResourceCollection
    {
        $works = CompetitionWork::query()
            ->where('type', 'painting')
            ->paginate(50);
        return CompetitionWorkResource::collection($works);
    }

    public function getPaintingsByDistrict(int $district_id): AnonymousResourceCollection
    {
        $works = CompetitionWork::query()
            ->where('district_id', $district_id)
            ->where('type', '=', 'painting')
            ->paginate(50);
        return CompetitionWorkResource::collection($works);
    }
}
