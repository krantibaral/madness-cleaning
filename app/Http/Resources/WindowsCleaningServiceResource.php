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
            'location' => $this->location,
            'number_of_windows' => $this->number_of_windows,
            'number_of_story' => $this->number_of_story,
            'message' => $this->message,
            'service_date' => $this->service_date,
            'service_time' => $this->service_time, //example, 14:30 would represent 2:30 PM, and 09:00 would represent 9:00 AM.
            'type' => $this->type,
            'windows_track_frame' => $this->windows_track_frame,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
