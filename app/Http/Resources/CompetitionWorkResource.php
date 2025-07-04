<?php

namespace App\Http\Resources;

use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompetitionWorkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $location = District::find($this->district_id)->title;

        return [
            'id' => $this->id,
            'title' => $this->title,
            'author' => $this->fio_participant,
            'age' => $this->age,
            'location' => $location,
            'curator' => $this->fio_curator,
            'city' => $this->city,
            'organization' => $this->organization,
            'image' => $this->file ? asset('storage/images/' . $this->file) : null,
            'place' => $this->place,
            'diploma' => asset('storage/diplomas/' . $this->id . '.jpg')
        ];
    }
}
