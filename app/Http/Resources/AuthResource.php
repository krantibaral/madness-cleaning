<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'token' => $this->access_token,
            'avatar' => $this->getFirstMediaUrl('avatars'),
        ];
    }

    public function with($request)
    {
        return ['success' => true, 'message' => $this->responseMessage];
    }
}
