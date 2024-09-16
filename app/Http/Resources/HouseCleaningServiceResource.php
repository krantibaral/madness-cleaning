<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HouseCleaningServiceResource extends JsonResource
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
            'number_of_bedroom' => $this->number_of_bedroom,
            'number_of_bathroom' => $this->number_of_bathroom,
            'number_of_story' => $this->number_of_story,
            'frequency' => $this->frequency,
            'message' => $this->message,
            'status' => $this->status,
            'service_date' => $this->service_date,
            'service_time' => $this->service_time, //example, 14:30 would represent 2:30 PM, and 09:00 would represent 9:00 AM.       
        ];
    }
}
