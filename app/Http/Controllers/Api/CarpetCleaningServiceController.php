<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarpetCleaningServiceRequest;
use App\Http\Resources\CarpetCleaningServiceResource;
use App\Models\CarpetCleaningService;
use Illuminate\Http\JsonResponse;
use App\Models\Booking;

class CarpetCleaningServiceController extends Controller
{
    /**
     * Display a listing of the resources.
     */
    public function index(): JsonResponse
    {
        $services = CarpetCleaningService::all();
        return response()->json([
            'status' => 'success',
            'data' => CarpetCleaningServiceResource::collection($services),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarpetCleaningServiceRequest $request): JsonResponse
    {
        $service = CarpetCleaningService::create($request->validated());
        Booking::create([
            'carpet_cleaning_service_id' => $service->id,

        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Carpet cleaning service created successfully.',
            'data' => new CarpetCleaningServiceResource($service),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id): JsonResponse
    {
        $service = CarpetCleaningService::findOrFail($id);
        return response()->json([
            'status' => 'success',
            'data' => new CarpetCleaningServiceResource($service),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarpetCleaningServiceRequest $request, $id): JsonResponse
    {
        $service = CarpetCleaningService::findOrFail($id);
        $service->update($request->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'Carpet cleaning service updated successfully.',
            'data' => new CarpetCleaningServiceResource($service),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        $service = CarpetCleaningService::findOrFail($id);
        $service->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Carpet cleaning service deleted successfully.',
        ], 204);
    }
}
