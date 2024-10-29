<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBuilderCleaningServiceRequest extends FormRequest
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
            'phone' => 'required|string|max:20',
            'location' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'service_name' => 'required|string|max:255',
            'service_date' => 'nullable|date',
            'service_time' => 'nullable|date_format:H:i',
            'type_of_commercial_space' => 'required|in:Office,Retail Store,Warehouse,Restaurant,Other',
            'site_visit_date' => 'nullable|date',
            'message_box' => 'nullable|string',
            'price' => 'required|integer',
            'status' => 'required|in:Pending,Cancelled,Approved',
        ];
    }
}
