<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeaseCleaningRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Set to true to allow the request to be authorized
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
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'location' => 'required|string|max:255',
            'number_of_bedrooms' => 'required|integer|min:1',
            'number_of_bathrooms' => 'required|integer|min:1',
            'window_cleaning' => 'required|in:Inside,Outside,Both',
            'oven_cleaning' => 'nullable|boolean',
            'stove_cleaning' => 'nullable|boolean',
            'number_of_walls_cleaned' => 'nullable|integer|min:0',
            'carpet_steam_cleaning_area' => 'required|numeric|min:0', 
            'carpet_steam_cleaning_unit' => 'required|in:sqft,sqm',
            'service_name' => 'required|string|max:255',
            'service_date' => 'required|date',
            'service_time' => 'required|date_format:H:i',
            'price' => 'required|integer',
            'message' => 'nullable|string|max:500',
            'status' => 'nullable|in:Pending,Cancelled,Approved',
        ];
    }
}
