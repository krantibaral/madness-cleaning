<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RubbishRemovalServiceResource extends JsonResource
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
            'service_date' => $this->service_date,
            'service_time' => $this->service_time,
            'price' => $this->price,
            'number_of_tyres' => $this->number_of_tyres,
            'number_of_furniture' => $this->number_of_furniture,
            'number_of_mattress' => $this->number_of_mattress,
            'message_box' => $this->message_box,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
