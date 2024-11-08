<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBuilderCleaningServiceRequest;
use App\Http\Resources\BuilderCleaningServiceResource;
use App\Models\BuilderCleaningService;
use App\Models\Booking;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BuilderCleaningServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $services = BuilderCleaningService::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Builder cleaning services retrieved successfully.',
            'data' => BuilderCleaningServiceResource::collection($services),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBuilderCleaningServiceRequest $request): JsonResponse
    {

        $service = BuilderCleaningService::create($request->validated());


        Booking::create([
            'user_id' => auth()->id(),
            'builder_cleaning_service_id' => $service->id,

        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Builder cleaning service created successfully.',
            'data' => new BuilderCleaningServiceResource($service),
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(BuilderCleaningService $BuilderCleaningService): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Builder cleaning service retrieved successfully.',
            'data' => new BuilderCleaningServiceResource($BuilderCleaningService),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBuilderCleaningServiceRequest $request, BuilderCleaningService $BuilderCleaningService): JsonResponse
    {
        $BuilderCleaningService->update($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Builder cleaning service updated successfully.',
            'data' => new BuilderCleaningServiceResource($BuilderCleaningService),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BuilderCleaningService $BuilderCleaningService): JsonResponse
    {
        $BuilderCleaningService->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Builder cleaning service deleted successfully.',
        ], 204);
    }
}
