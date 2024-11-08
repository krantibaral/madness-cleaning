<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\HouseCleaningServiceRequest;
use App\Http\Resources\HouseCleaningServiceResource;
use App\Models\HouseCleaningService;
use Illuminate\Http\JsonResponse;
use App\Models\Booking;

class HouseCleaningServiceController extends Controller
{
    /**
     * Display a listing of the resources.
     */
    public function index(): JsonResponse
    {
        $services = HouseCleaningService::all();
        return response()->json([
            'status' => 'success',
            'data' => HouseCleaningServiceResource::collection($services),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HouseCleaningServiceRequest $request): JsonResponse
    {
        // Create the house cleaning service
        $service = HouseCleaningService::create($request->validated());

        // Create a booking for the newly created service
        Booking::create([
            'user_id' => auth()->id(),
            'house_cleaning_service_id' => $service->id, 
         
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'House cleaning service created successfully.',
            'data' => new HouseCleaningServiceResource($service),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id): JsonResponse
    {
        $service = HouseCleaningService::findOrFail($id);
        return response()->json([
            'status' => 'success',
            'data' => new HouseCleaningServiceResource($service),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HouseCleaningServiceRequest $request, $id): JsonResponse
    {
        $service = HouseCleaningService::findOrFail($id);
        $service->update($request->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'House cleaning service updated successfully.',
            'data' => new HouseCleaningServiceResource($service),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        $service = HouseCleaningService::findOrFail($id);
        $service->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'House cleaning service deleted successfully.',
        ], 204);
    }
}
