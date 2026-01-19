<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GolfCourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => trim($this->name),
            'type' => $this->course_type,
            'location' => [
                'city' => $this->city,
                'country' => $this->country,
                'lat' => (float) $this->latitude,
                'lng' => (float) $this->longitude,
            ],
            'price' => $this->green_fees
                ? (int) $this->green_fees
                : null,
        ];
    }
}
