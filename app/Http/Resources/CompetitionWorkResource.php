<?php

namespace App\Http\Resources;

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
        return [
            'id' => $this->id,
            'title' => $this->title,
            'name' => $this->fio_participant,
            'age' => $this->age,
            'city' => $this->city,
            'from' => $this->educational_institution,
            'image' => $this->file ? asset('storage/images/' . $this->file) : null,
            'curator' => $this->fio_curator
        ];
    }
}
