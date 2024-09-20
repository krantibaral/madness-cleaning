<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LeaseCleaningResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'location' => $this->location,
            'number_of_bedrooms' => $this->number_of_bedrooms,
            'number_of_bathrooms' => $this->number_of_bathrooms,
            'message' => $this->message,
            'service_date' => $this->service_date,
            'service_time' => $this->service_time,
            'status' => $this->status,
            'window_cleaning' => $this->window_cleaning, // inside, outside, or both
            'oven_cleaning' => $this->oven_cleaning, // boolean value
            'stove_cleaning' => $this->stove_cleaning, // boolean value
            'number_of_walls_cleaned' => $this->number_of_walls_cleaned, // integer
            'carpet_steam_cleaning_area' => $this->carpet_steam_cleaning_area, // string (nullable)
            'carpet_steam_cleaning_unit' => $this->carpet_steam_cleaning_unit, // enum: sqft or sqm (nullable)
        ];
    }
}
