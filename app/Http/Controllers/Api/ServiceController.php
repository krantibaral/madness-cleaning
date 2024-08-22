<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Http\Requests\ServiceRequest;
use App\Http\Resources\ServiceResource;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        try {
            // Retrieve all Services
            $data = Service::all();

            if ($data->isEmpty()) {
                return response()->json([
                    'status' => true,
                    'message' => 'No Records Found'
                ], 404);
            }
            // Return Services as a resource collection
            return response()->json([
                'status' => true,
                'Services' => ServiceResource::collection($data)
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something Went Wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(ServiceRequest $request)
    {
        try {
            $data = Service::create($request->validated());
            return response()->json([
                'status' => true,
                'message' => 'Service Created Successfully',
                'Service' => new ServiceResource($data)
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something Went Wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function show($id)
    {
        try {
            // Find the Service by ID
            $data = Service::findOrFail($id);

            return response()->json([
                'status' => true,
                'Service' => new ServiceResource($data)
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => true,
                'message' => 'No such Service found!'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function update(ServiceRequest $request, int $id)
    {
        try {
            // Find the Service by ID
            $data = Service::findOrFail($id);

            // Update the Service with validated data
            $data->update($request->validated());

            return response()->json([
                'status' => true,
                'message' => 'Service updated successfully',
                'Service' => new ServiceResource($data)
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => true,
                'message' => 'No Service Found!'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            // Find the Service by ID
            $data = Service::findOrFail($id);

            // Delete the Service
            $data->delete();

            return response()->json([
                'status' => true,
                'message' => 'Service Deleted Successfully!'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => true,
                'message' => 'No such Service found!'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
