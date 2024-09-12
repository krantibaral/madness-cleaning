<?php

namespace App\Http\Controllers\Api;

use App\Models\LeaseCleaning;
use App\Http\Requests\LeaseCleaningRequest;
use App\Http\Resources\LeaseCleaningResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeaseCleaningController extends Controller
{
    /**
     * Display a listing of the house cleaning services.
     */
    public function index()
    {
        $services = LeaseCleaning::all();

        return response()->json([
            'status' => 'success',
            'message' => 'House cleaning services retrieved successfully',
            'data' => LeaseCleaningResource::collection($services)
        ], 200);
    }

    /**
     * Store a newly created house cleaning service in storage.
     */
    public function store(LeaseCleaningRequest $request)
    {
        $service = LeaseCleaning::create($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'House cleaning service created successfully',
            'data' => new LeaseCleaningResource($service)
        ], 201);
    }

    /**
     * Display the specified house cleaning service.
     */
    public function show($id)
    {
        $service = LeaseCleaning::findOrFail($id);

        return response()->json([
            'status' => 'success',
            'message' => 'House cleaning service retrieved successfully',
            'data' => new LeaseCleaningResource($service)
        ], 200);
    }

    /**
     * Update the specified house cleaning service in storage.
     */
    public function update(LeaseCleaningRequest $request, $id)
    {
        $service = LeaseCleaning::findOrFail($id);
        $service->update($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'House cleaning service updated successfully',
            'data' => new LeaseCleaningResource($service)
        ], 200);
    }

    /**
     * Remove the specified house cleaning service from storage.
     */
    public function destroy($id)
    {
        $service = LeaseCleaning::findOrFail($id);
        $service->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'House cleaning service deleted successfully',
            'data' => null
        ], 204);
    }
}
