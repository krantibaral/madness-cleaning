<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LeaseCleaningRequest;
use App\Http\Resources\LeaseCleaningResource;
use App\Models\LeaseCleaning;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class LeaseCleaningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $leaseCleanings = LeaseCleaning::all();
        return response()->json(LeaseCleaningResource::collection($leaseCleanings), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LeaseCleaningRequest $request): JsonResponse
    {
        $leaseCleaning = LeaseCleaning::create($request->validated());
        return response()->json(new LeaseCleaningResource($leaseCleaning), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(LeaseCleaning $leaseCleaning): JsonResponse
    {
        return response()->json(new LeaseCleaningResource($leaseCleaning), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LeaseCleaningRequest $request, LeaseCleaning $leaseCleaning): JsonResponse
    {
        $leaseCleaning->update($request->validated());
        return response()->json(new LeaseCleaningResource($leaseCleaning), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeaseCleaning $leaseCleaning): JsonResponse
    {
        $leaseCleaning->delete();
        return response()->json(null, 204);
    }
}
