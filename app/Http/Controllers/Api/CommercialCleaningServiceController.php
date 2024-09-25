<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommercialCleaningServiceRequest;
use App\Http\Resources\CommercialCleaningServiceResource;
use App\Models\CommercialCleaningService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommercialCleaningServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $services = CommercialCleaningService::all();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Commercial cleaning services retrieved successfully.',
            'data' => CommercialCleaningServiceResource::collection($services),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommercialCleaningServiceRequest $request): JsonResponse
    {
        $service = CommercialCleaningService::create($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Commercial cleaning service created successfully.',
            'data' => new CommercialCleaningServiceResource($service),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CommercialCleaningService $commercialCleaningService): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Commercial cleaning service retrieved successfully.',
            'data' => new CommercialCleaningServiceResource($commercialCleaningService),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCommercialCleaningServiceRequest $request, CommercialCleaningService $commercialCleaningService): JsonResponse
    {
        $commercialCleaningService->update($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Commercial cleaning service updated successfully.',
            'data' => new CommercialCleaningServiceResource($commercialCleaningService),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommercialCleaningService $commercialCleaningService): JsonResponse
    {
        $commercialCleaningService->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Commercial cleaning service deleted successfully.',
        ], 204);
    }
}
