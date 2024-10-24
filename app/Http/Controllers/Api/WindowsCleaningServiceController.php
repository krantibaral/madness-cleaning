<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WindowsCleaningService;
use App\Models\Booking;
use App\Models\BookedService;
use Illuminate\Support\Facades\Auth;
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
        // Step 1: Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'location' => 'required|string|max:255',
            'number_of_windows' => 'required|integer',
            'number_of_story' => 'required|integer',
            'price' => 'required|integer',
            'message' => 'nullable|string',
            'service_date' => 'required|date',
            'service_time' => 'required|date_format:H:i',
            'type' => 'required|in:Inside,Outside',
            'windows_track_frame' => 'required|in:Track,Frame',
            'status' => 'nullable|in:Pending,Cancelled,Approved',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
                'message' => 'Validation failed.'
            ], 422);
        }

        // Step 2: Check if the service already exists for the given email and date
        $service = WindowsCleaningService::where('email', $request->email)
            ->where('service_date', $request->service_date)
            ->first();

        if ($service) {
            // Step 3: If service exists, update the record
            $service->update($validator->validated());
        } else {
            // Step 4: If not, create a new service record
            $service = WindowsCleaningService::create($validator->validated());
        }

        // Step 5: Store the booking related to this service
        $booking = Booking::create([
            'window_cleaning_service_id' => $service->id,

            'status' => $request->status ?? 'Pending',
        ]);

        // Step 6: Return the response
        return response()->json([
            'status' => 'success',
            'data' => [
                'service' => new WindowsCleaningServiceResource($service),
                // 'booking' => $booking
            ],
            'message' => 'Service created and booked successfully.'
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
            'location' => 'required|string|max:255',
            'number_of_windows' => 'required|integer',
            'number_of_story' => 'required|integer',
            'message' => 'nullable|string',
            'service_date' => 'required|date',
            'service_time' => 'required|date_format:H:i',
            'type' => 'required|in:inside,outside',
            'windows_track_frame' => 'required|in:Track,Frame',
            'status' => 'nullable|in:Pending,Cancelled,Approved',
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
