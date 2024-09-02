<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WindowsCleaningServiceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'number_of_windows' => $this->number_of_windows,
            'number_of_story' => $this->number_of_story,
            'message' => $this->message,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
