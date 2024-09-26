<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RubbishRemovalServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Ensure the request is authorized
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
            'phone' => 'required|string|max:15',
            'location' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'service_date' => 'required|date',
            'service_time' => 'required|date_format:H:i',
            'price' => 'required|integer',
            'number_of_tyres' => 'required|integer|min:0',
            'number_of_furniture' => 'required|integer|min:0',
            'number_of_mattress' => 'required|integer|min:0',
            'message_box' => 'nullable|string',
            'status' => 'in:Pending,Cancelled,Approved',
        ];
    }
}
