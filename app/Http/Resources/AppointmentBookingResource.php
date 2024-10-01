<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentBookingResource extends JsonResource
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

            // Boolean fields
            'handyman_jobs' => $this->handyman_jobs,
            'plumbers' => $this->plumbers,
            'electricians' => $this->electricians,
            'builders' => $this->builders,
            'real_estate_agents' => $this->real_estate_agents,
            'locksmiths' => $this->locksmiths,
            'landscapers' => $this->landscapers,
            'tree_loopers' => $this->tree_loopers,
            'painters' => $this->painters,
            'glass_repairers' => $this->glass_repairers,
            'blinds_and_curtain_fitters' => $this->blinds_and_curtain_fitters,
            'flooring' => $this->flooring,
            'carpet_layers' => $this->carpet_layers,
            'tilers' => $this->tilers,
            'event_planners' => $this->event_planners,
            'photographers' => $this->photographers,
            'cabinet_maker' => $this->cabinet_maker,
            'pest_control' => $this->pest_control,
            'removalists' => $this->removalists,
            'cctv_installer' => $this->cctv_installer,

            'message_box' => $this->message_box,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
