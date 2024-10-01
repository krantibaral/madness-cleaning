<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Set this to true if you want all users to be able to make this request
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'location' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'service_date' => 'required|date',

            // Boolean fields for services
            'handyman_jobs' => 'boolean',
            'plumbers' => 'boolean',
            'electricians' => 'boolean',
            'builders' => 'boolean',
            'real_estate_agents' => 'boolean',
            'locksmiths' => 'boolean',
            'landscapers' => 'boolean',
            'tree_loopers' => 'boolean',
            'painters' => 'boolean',
            'glass_repairers' => 'boolean',
            'blinds_and_curtain_fitters' => 'boolean',
            'flooring' => 'boolean',
            'carpet_layers' => 'boolean',
            'tilers' => 'boolean',
            'event_planners' => 'boolean',
            'photographers' => 'boolean',
            'cabinet_maker' => 'boolean',
            'pest_control' => 'boolean',
            'removalists' => 'boolean',
            'cctv_installer' => 'boolean',

            'message_box' => 'nullable|string',
        ];
    }
}
