<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseCleaningServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
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
            'number_of_bedroom' => 'required|integer|min:1',
            'number_of_bathroom' => 'required|integer|min:1',
            'number_of_story' => 'required|integer|min:1',
            'frequency' => 'required|in:Weekly,Fortnightly,Monthly',
            'service_date' => 'required|date',
            'service_time' => 'required|date_format:H:i',
            'message' => 'nullable|string',
            'status' => 'in:Pending,Cancelled,Approved',
        ];
    }
}
