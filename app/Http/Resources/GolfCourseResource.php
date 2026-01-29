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
            'cover_image' => $this->cover_image,
            'holes' => (int) $this->holes,
            'par' => (int) $this->par,
            'location' => [
                'city' => $this->city,
                'country' => $this->country,
                'lat' => $this->latitude ? (float) $this->latitude : null,
                'lng' => $this->longitude ? (float) $this->longitude : null,
            ],
            'price' => $this->green_fees ? (int) $this->green_fees : null,
            'rating' => $this->rating ? round((float) $this->rating, 1) : null,
            'reviews_count' => (int) ($this->reviews_count ?? 0),
            'phone' => $this->phone,
            'website' => $this->website,
            'description' => $this->description,
            'is_open_now' => $this->when(
                $this->is_open_now !== null, 
                (bool) $this->is_open_now
            ),
            'opening_hours' => $this->when(
                $this->opening_hours, 
                json_decode($this->opening_hours, true)
            ),
            'is_active' => (bool) $this->is_active,
            'likes_count' => (int) ($this->likes_count ?? 0),
            'views_count' => (int) ($this->views_count ?? 0),
            'google_place_id' => $this->google_place_id,
        ];
    }
}