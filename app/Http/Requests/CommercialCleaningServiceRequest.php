<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommercialCleaningServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Set to true to allow validation for all users
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15', // Assuming a max length for phone numbers
            'location' => 'required|string|max:255',
            'email' => 'required|email|unique:commercial_cleaning_services,email',
            'service_date' => 'nullable|date',
            'service_time' => 'nullable|date_format:H:i',
            'type_of_commercial_space' => 'required|in:Office,Retail Store,Warehouse,Restaurant,Other',
            'site_visit_date' => 'nullable|date',
            'message_box' => 'nullable|string',
            'price' => 'required|integer|min:0',
            'status' => 'required|in:Pending,Cancelled,Approved',
        ];
    }
}
