<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\WindowsCleaningServiceRequest;
use App\Models\WindowsCleaningService;
use App\Models\Booking;
use App\Http\Resources\WindowsCleaningServiceResource;
use App\Notifications\BookingNotification;

class WindowsCleaningServiceController extends Controller
{
    /**
     * Display a listing of the Windows Cleaning Services.
     */
    public function index(): JsonResponse
    {
        $services = WindowsCleaningService::all();
        return response()->json([
            'status' => 'success',
            'data' => WindowsCleaningServiceResource::collection($services),
            'message' => 'Services retrieved successfully.'
        ], 200);
    }

    /**
     * Store a newly created Windows Cleaning Service in storage.
     */
    public function store(WindowsCleaningServiceRequest $request): JsonResponse
    {

        $service = WindowsCleaningService::create($request->validated());


        $booking = Booking::create([
            'user_id' => auth()->id(),
            'window_cleaning_service_id' => $service->id,

        ]);
        if ($user = auth()->user()) {
            $user->notify(new BookingNotification($booking));
        } else {

            return response()->json(['error' => 'User not authenticated'], 401);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Windows cleaning service created successfully.',
            'data' => new WindowsCleaningServiceResource($service),
        ], 201);
    }

    /**
     * Display the specified Windows Cleaning Service.
     */
    public function show($id): JsonResponse
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

    /**
     * Update the specified Windows Cleaning Service in storage.
     */
    public function update(Request $request, $id): JsonResponse
    {
        $service = WindowsCleaningService::find($id);

        if (!$service) {
            return response()->json([
                'status' => 'error',
                'message' => 'Service not found.'
            ], 404);
        }

        $service->update($request->all());
        return response()->json([
            'status' => 'success',
            'data' => new WindowsCleaningServiceResource($service),
            'message' => 'Service updated successfully.'
        ], 200);
    }

    /**
     * Remove the specified Windows Cleaning Service from storage.
     */
    public function destroy($id): JsonResponse
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
