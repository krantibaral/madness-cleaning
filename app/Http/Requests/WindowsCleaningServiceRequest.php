<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WindowsCleaningServiceRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Set to true if you want this request to be authorized by default
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'location' => 'required|string|max:255',
            'number_of_windows' => 'required|integer',
            'number_of_story' => 'required|integer',
            'message' => 'nullable|string',
            'service_date' => 'required|date',
            'service_time' => 'required|date_format:H:i',
            'type' => 'required|in:Inside,Outside',
            'status' => 'in:Pending,Cancelled,Approved',
            'price' => 'required|integer',
            'windows_track_frame' => 'required|in:Track,Frame',
        ];
    }
}

