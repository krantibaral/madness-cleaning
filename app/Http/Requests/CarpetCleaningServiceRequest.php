<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarpetCleaningServiceRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'location' => 'required|string|max:255',
            'service_date' => 'required|date',
            'service_time' => 'required|date_format:H:i',
            'carpet_steam_cleaning_area' => 'required|numeric|min:0', 
            'carpet_steam_cleaning_unit' => 'required|in:sqft,sqm',
            'carpet_stain_cleaning_area' => 'required|numeric|min:0', 
            'carpet_stain_cleaning_unit' => 'required|in:sqft,sqm',
            'price' => 'required|integer',
            'message' => 'nullable|string',
            'status' => 'nullable|in:Pending,Cancelled,Approved',
        ];
    }
}
