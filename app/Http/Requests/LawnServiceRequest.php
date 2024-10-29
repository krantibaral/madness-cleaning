<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LawnServiceRequest extends FormRequest
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
            'service_name' => 'required|string|max:255',
            'service_date' => 'required|date',
            'service_time' => 'required|date_format:H:i',
            'message_box' => 'nullable|string',
            'type_of_lawn_service' => 'required|in:Mowing,Trimming,Weeding,Pruning,Other',
            'price' => 'required|integer',
            'status' => 'in:Pending,Cancelled,Approved',
        ];
    }
}
