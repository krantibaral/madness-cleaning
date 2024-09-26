<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RubbishRemovalServiceRequest;
use App\Http\Resources\RubbishRemovalServiceResource;
use App\Models\RubbishRemovalService;
use Illuminate\Http\JsonResponse;

class RubbishRemovalServiceController extends Controller
{
    /**
     * Display a listing of the resources.
     */
    public function index(): JsonResponse
    {
        $services = RubbishRemovalService::all();
        return response()->json([
            'status' => 'success',
            'data' => RubbishRemovalServiceResource::collection($services),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RubbishRemovalServiceRequest $request): JsonResponse
    {
        $service = RubbishRemovalService::create($request->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'Rubbish removal service created successfully.',
            'data' => new RubbishRemovalServiceResource($service),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id): JsonResponse
    {
        $service = RubbishRemovalService::findOrFail($id);
        return response()->json([
            'status' => 'success',
            'data' => new RubbishRemovalServiceResource($service),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RubbishRemovalServiceRequest $request, $id): JsonResponse
    {
        $service = RubbishRemovalService::findOrFail($id);
        $service->update($request->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'Rubbish removal service updated successfully.',
            'data' => new RubbishRemovalServiceResource($service),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        $service = RubbishRemovalService::findOrFail($id);
        $service->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Rubbish removal service deleted successfully.',
        ], 204);
    }
}
