<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LeaseCleaningRequest;
use App\Http\Resources\LeaseCleaningResource;
use App\Models\LeaseCleaning;
use App\Models\Booking; // Import the Booking model
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LeaseCleaningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $leaseCleanings = LeaseCleaning::all();
        return response()->json([
            'status' => 'success',
            'data' => LeaseCleaningResource::collection($leaseCleanings),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LeaseCleaningRequest $request): JsonResponse
    {
        try {
            $leaseCleaning = LeaseCleaning::create($request->validated());

       
            Booking::create([
                'user_id' => auth()->id(),
                'lease_cleaning_service_id' => $leaseCleaning->id, 
         
            ]);

            return response()->json([
                'status' => 'success',
                'data' => new LeaseCleaningResource($leaseCleaning),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to create the resource. Please try again.',
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
            $leaseCleaning = LeaseCleaning::findOrFail($id);
            return response()->json([
                'status' => 'success',
                'data' => new LeaseCleaningResource($leaseCleaning),
            ], 200);
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
    public function update(LeaseCleaningRequest $request, $id): JsonResponse
    {
        try {
            $leaseCleaning = LeaseCleaning::findOrFail($id);
            $leaseCleaning->update($request->validated());
            return response()->json([
                'status' => 'success',
                'data' => new LeaseCleaningResource($leaseCleaning),
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Resource not found.',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to update the resource. Please try again.',
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
            $leaseCleaning = LeaseCleaning::findOrFail($id);
            $leaseCleaning->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Resource successfully deleted.',
            ], 204);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Resource not found.',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to delete the resource. Please try again.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
