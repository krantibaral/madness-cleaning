<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WindowsCleaningService;
use App\Http\Resources\WindowsCleaningServiceResource;
use Illuminate\Support\Facades\Validator;

class WindowsCleaningServiceController extends Controller
{
    public function index()
    {
        $services = WindowsCleaningService::all();
        return response()->json([
            'status' => 'success',
            'data' => WindowsCleaningServiceResource::collection($services),
            'message' => 'Services retrieved successfully.'
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'number_of_windows' => 'required|integer',
            'number_of_story' => 'required|integer',
            'message' => 'nullable|string',
            'service_date' => 'required|date',
            'service_time' => 'required|date_format:H:i',
            'type' => 'required|in:Inside,Outside',
            'windows_track_frame' => 'required|in:Track,Frame',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
                'message' => 'Validation failed.'
            ], 422);
        }

        $service = WindowsCleaningService::create($validator->validated());
        return response()->json([
            'status' => 'success',
            'data' => new WindowsCleaningServiceResource($service),
            'message' => 'Service created successfully.'
        ], 201);
    }

    public function show($id)
    {
        $service = WindowsCleaningService::find($id);

        if (!$service) {
            return response()->json([
                'status' => 'error',
                'message' => 'Service not found.'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => new WindowsCleaningServiceResource($service),
            'message' => 'Service retrieved successfully.'
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $service = WindowsCleaningService::find($id);

        if (!$service) {
            return response()->json([
                'status' => 'error',
                'message' => 'Service not found.'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'number_of_windows' => 'required|integer',
            'number_of_story' => 'required|integer',
            'message' => 'nullable|string',
            'service_date' => 'required|date',
            'service_time' => 'required|date_format:H:i',
            'type' => 'required|in:inside,outside',
            'windows_track_frame' => 'required|in:Track,Frame',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
                'message' => 'Validation failed.'
            ], 422);
        }

        $service->update($validator->validated());
        return response()->json([
            'status' => 'success',
            'data' => new WindowsCleaningServiceResource($service),
            'message' => 'Service updated successfully.'
        ], 200);
    }

    public function destroy($id)
    {
        $service = WindowsCleaningService::find($id);

        if (!$service) {
            return response()->json([
                'status' => 'error',
                'message' => 'Service not found.'
            ], 404);
        }

        $service->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Service deleted successfully.'
        ], 200);
    }
}
