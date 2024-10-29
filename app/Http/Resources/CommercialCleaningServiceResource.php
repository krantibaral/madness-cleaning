<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommercialCleaningServiceResource extends JsonResource
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
            'phone' => $this->phone,
            'location' => $this->location,
            'email' => $this->email,
            'service_name' => $this->service_name,
            'service_date' => $this->service_date,
            'service_time' => $this->service_time,
            'type_of_commercial_space' => $this->type_of_commercial_space,
            'site_visit_date' => $this->site_visit_date,
            'message_box' => $this->message_box,
            'price' => $this->price,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
