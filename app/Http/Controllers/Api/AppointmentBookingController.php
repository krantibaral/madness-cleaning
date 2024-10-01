<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentBookingRequest;
use App\Http\Resources\AppointmentBookingResource;
use App\Models\AppointmentBooking;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AppointmentBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $services = AppointmentBooking::all();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Appointment Booking retrieved successfully.',
            'data' => AppointmentBookingResource::collection($services),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AppointmentBookingRequest $request): JsonResponse
    {
        $service = AppointmentBooking::create($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Appointment Booking created successfully.',
            'data' => new AppointmentBookingResource($service),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(AppointmentBooking $AppointmentBooking): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Appointment Booking retrieved successfully.',
            'data' => new AppointmentBookingResource($AppointmentBooking),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AppointmentBookingRequest $request, AppointmentBooking $AppointmentBooking): JsonResponse
    {
        $AppointmentBooking->update($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Appointment Booking updated successfully.',
            'data' => new AppointmentBookingResource($AppointmentBooking),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppointmentBooking $AppointmentBooking): JsonResponse
    {
        $AppointmentBooking->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Appointment Booking deleted successfully.',
        ], 204);
    }
}
