<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommercialCleaningServiceRequest;
use App\Http\Resources\CommercialCleaningServiceResource;
use App\Models\CommercialCleaningService;
use Illuminate\Http\Response;

class CommercialCleaningServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cleaningServices = CommercialCleaningService::all();

        // Return a collection of resources
        return CommercialCleaningServiceResource::collection($cleaningServices);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommercialCleaningServiceRequest $request)
    {
        // Create a new commercial cleaning service using the validated request data
        $cleaningService = CommercialCleaningService::create($request->validated());

        // Return the created resource
        return new CommercialCleaningServiceResource($cleaningService);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cleaningService = CommercialCleaningService::findOrFail($id);

        // Return the individual resource
        return new CommercialCleaningServiceResource($cleaningService);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommercialCleaningServiceRequest $request, $id)
    {
        $cleaningService = CommercialCleaningService::findOrFail($id);

        // Update the resource with validated data
        $cleaningService->update($request->validated());

        // Return the updated resource
        return new CommercialCleaningServiceResource($cleaningService);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cleaningService = CommercialCleaningService::findOrFail($id);

        // Delete the resource
        $cleaningService->delete();

        // Return a response with no content
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
