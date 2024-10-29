<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LawnServiceResource extends JsonResource
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
            'price' => $this->price,
            'type_of_lawn_service' => $this->type_of_lawn_service,
            'status' => $this->status,
            'service_name' => $this->service_name,
            'service_date' => $this->service_date,
            'service_time' => $this->service_time,
            'message_box' => $this->message_box
        ];
    }
}
