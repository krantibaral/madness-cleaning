<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarpetCleaningServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'location' => 'required|string|max:255',
            'service_date' => 'required|date',
            'service_time' => 'required|date_format:H:i',
            'carpet_steam_cleaning_area' => 'nullable|string|max:255',
            'carpet_steam_cleaning_unit' => 'nullable|in:sqft,sqm',
            'carpet_stain_cleaning_area' => 'nullable|string|max:255',
            'carpet_stain_cleaning_unit' => 'nullable|in:sqft,sqm',
            'message' => 'nullable|string',
        ];
    }
}
