<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WindowsCleaningService;
use App\Http\Resources\WindowsCleaningServiceResource;

class WindowsCleaningServiceController extends Controller
{
    public function index()
    {
        $services = WindowsCleaningService::all();
        return WindowsCleaningServiceResource::collection($services);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'number_of_windows' => 'required|integer',
            'number_of_story' => 'required|integer',
            'message' => 'nullable|string',
            'service_date' => 'required|date', // Added validation for service date
            'service_time' => 'required|date_format:H:i', // Added validation for service time
        ]);

        $service = WindowsCleaningService::create($validated);
        return new WindowsCleaningServiceResource($service);
    }

    public function show($id)
    {
        $service = WindowsCleaningService::findOrFail($id);
        return new WindowsCleaningServiceResource($service);
    }

    public function update(Request $request, $id)
    {
        $service = WindowsCleaningService::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'number_of_windows' => 'required|integer',
            'number_of_story' => 'required|integer',
            'message' => 'nullable|string',
            'service_date' => 'required|date', 
            'service_time' => 'required|date_format:H:i', //must be in HH:MM format
        ]);

        $service->update($validated);
        return new WindowsCleaningServiceResource($service);
    }

    public function destroy($id)
    {
        $service = WindowsCleaningService::findOrFail($id);
        $service->delete();
        return response()->json(['message' => 'Service deleted successfully']);
    }
}
