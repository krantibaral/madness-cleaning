<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RubbishRemovalServiceRequest;
use App\Http\Resources\RubbishRemovalServiceResource;
use App\Models\RubbishRemovalService;
use App\Models\Booking; // Import the Booking model
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        try {
            $service = RubbishRemovalService::create($request->validated());

         
            Booking::create([
                'user_id' => auth()->id(),
                'rubbish_removal_service_id' => $service->id, 
         
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Rubbish removal service created successfully.',
                'data' => new RubbishRemovalServiceResource($service),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to create the rubbish removal service. Please try again.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id): JsonResponse
    {
        try {
            $service = RubbishRemovalService::findOrFail($id);
            return response()->json([
                'status' => 'success',
                'data' => new RubbishRemovalServiceResource($service),
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Resource not found.',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RubbishRemovalServiceRequest $request, $id): JsonResponse
    {
        try {
            $service = RubbishRemovalService::findOrFail($id);
            $service->update($request->validated());
            return response()->json([
                'status' => 'success',
                'message' => 'Rubbish removal service updated successfully.',
                'data' => new RubbishRemovalServiceResource($service),
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Resource not found.',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to update the rubbish removal service. Please try again.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        try {
            $service = RubbishRemovalService::findOrFail($id);
            $service->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Rubbish removal service deleted successfully.',
            ], 204);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Resource not found.',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to delete the rubbish removal service. Please try again.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
