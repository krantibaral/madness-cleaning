<?php

namespace App\Http\Controllers\Api;

use App\Models\HouseCleaningService;
use App\Http\Requests\HouseCleaningServiceRequest;
use App\Http\Resources\HouseCleaningServiceResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HouseCleaningServiceController extends Controller
{
    /**
     * Display a listing of the house cleaning services.
     */
    public function index()
    {
        $services = HouseCleaningService::all();

        return response()->json([
            'status' => 'success',
            'message' => 'House cleaning services retrieved successfully',
            'data' => HouseCleaningServiceResource::collection($services)
        ], 200);
    }

    /**
     * Store a newly created house cleaning service in storage.
     */
    public function store(HouseCleaningServiceRequest $request)
    {
        $service = HouseCleaningService::create($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'House cleaning service created successfully',
            'data' => new HouseCleaningServiceResource($service)
        ], 201);
    }

    /**
     * Display the specified house cleaning service.
     */
    public function show($id)
    {
        $service = HouseCleaningService::findOrFail($id);

        return response()->json([
            'status' => 'success',
            'message' => 'House cleaning service retrieved successfully',
            'data' => new HouseCleaningServiceResource($service)
        ], 200);
    }

    /**
     * Update the specified house cleaning service in storage.
     */
    public function update(HouseCleaningServiceRequest $request, $id)
    {
        $service = HouseCleaningService::findOrFail($id);
        $service->update($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'House cleaning service updated successfully',
            'data' => new HouseCleaningServiceResource($service)
        ], 200);
    }

    /**
     * Remove the specified house cleaning service from storage.
     */
    public function destroy($id)
    {
        $service = HouseCleaningService::findOrFail($id);
        $service->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'House cleaning service deleted successfully',
            'data' => null
        ], 204);
    }
}
