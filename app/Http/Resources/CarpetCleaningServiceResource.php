<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarpetCleaningServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'location' => $this->location,
            'service_date' => $this->service_date,
            'service_time' => $this->service_time,
            'carpet_steam_cleaning_area' => $this->carpet_steam_cleaning_area,
            'carpet_steam_cleaning_unit' => $this->carpet_steam_cleaning_unit,
            'carpet_stain_cleaning_area' => $this->carpet_stain_cleaning_area,
            'carpet_stain_cleaning_unit' => $this->carpet_stain_cleaning_unit,
            'message' => $this->message,
            'price' => $this->price,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
