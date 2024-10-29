<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LawnServiceRequest;
use App\Http\Resources\LawnServiceResource;
use App\Models\LawnService;
use App\Models\Booking; // Import the Booking model
use Illuminate\Http\JsonResponse;

class LawnServiceController extends Controller
{
    /**
     * Display a listing of the resources.
     */
    public function index(): JsonResponse
    {
        $services = LawnService::all();
        return response()->json([
            'status' => 'success',
            'data' => LawnServiceResource::collection($services),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LawnServiceRequest $request): JsonResponse
    {
        // Create the lawn service
        $service = LawnService::create($request->validated());

        // Create a booking for the newly created service
        Booking::create([
            'lawn_service_id' => $service->id, // Update with the correct foreign key
            // Include any other required fields for the booking here
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Lawn service created successfully.',
            'data' => new LawnServiceResource($service),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id): JsonResponse
    {
        $service = LawnService::findOrFail($id);
        return response()->json([
            'status' => 'success',
            'data' => new LawnServiceResource($service),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LawnServiceRequest $request, $id): JsonResponse
    {
        $service = LawnService::findOrFail($id);
        $service->update($request->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'Lawn service updated successfully.',
            'data' => new LawnServiceResource($service),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        $service = LawnService::findOrFail($id);
        $service->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Lawn service deleted successfully.',
        ], 204);
    }
}
