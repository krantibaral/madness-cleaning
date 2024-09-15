<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarpetCleaningServiceRequest;
use App\Http\Resources\CarpetCleaningServiceResource;
use App\Models\CarpetCleaningService;
use Illuminate\Http\JsonResponse;

class CarpetCleaningServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $services = CarpetCleaningService::all();
        return response()->json([
            'status' => 'success',
            'data' => CarpetCleaningServiceResource::collection($services)
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarpetCleaningServiceRequest $request): JsonResponse
    {
        $service = CarpetCleaningService::create($request->validated());
        return response()->json([
            'status' => 'success',
            'data' => new CarpetCleaningServiceResource($service)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CarpetCleaningService $carpetCleaningService): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => new CarpetCleaningServiceResource($carpetCleaningService)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarpetCleaningServiceRequest $request, CarpetCleaningService $carpetCleaningService): JsonResponse
    {
        $carpetCleaningService->update($request->validated());
        return response()->json([
            'status' => 'success',
            'data' => new CarpetCleaningServiceResource($carpetCleaningService)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarpetCleaningService $carpetCleaningService): JsonResponse
    {
        $carpetCleaningService->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Carpet cleaning service deleted successfully'
        ], 204);
    }
}
