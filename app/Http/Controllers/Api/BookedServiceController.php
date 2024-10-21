<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BookedService;
use Illuminate\Http\Request;

class BookedServiceController extends Controller
{
    // Retrieve a specific booked service by service_id
    public function getBookedServiceDetails($service_id)
    {
        $bookedService = BookedService::where('service_id', $service_id)->first();

        if (!$bookedService) {
            return response()->json([
                'status' => 'error',
                'message' => 'Booked service not found.'
            ], 404);
        }

        $serviceDetails = $this->getServiceDetailsByServiceId($bookedService->service_name, $bookedService->service_id);

        return response()->json([
            'status' => 'success',
            'data' => [
                'booked_service' => $bookedService,
                'service_details' => $serviceDetails
            ],
            'message' => 'Booked service retrieved successfully.'
        ], 200);
    }

    // Retrieve all booked services for the authenticated user
    public function getAllBookedServices()
    {
        // Assuming you're fetching booked services for the authenticated user
        $user = auth()->user();
        $bookedServices = BookedService::where('user_id', $user->id)->get();

        // Loop through booked services and fetch corresponding service details
        $servicesWithDetails = $bookedServices->map(function ($bookedService) {
            $serviceDetails = $this->getServiceDetailsByServiceId($bookedService->service_name, $bookedService->service_id);
            return [
                'booked_service' => $bookedService,
                'service_details' => $serviceDetails
            ];
        });

        return response()->json([
            'status' => 'success',
            'data' => $servicesWithDetails,
            'message' => 'All booked services retrieved successfully.'
        ], 200);
    }

    // Helper method to get service details based on service type and ID
    private function getServiceDetailsByServiceId($service_name, $service_id)
    {
        switch ($service_name) {
            case 'Windows cleaning':
                return \App\Models\WindowsCleaningService::find($service_id);
            case 'Carpet cleaning':
                return \App\Models\CarpetCleaningService::find($service_id);
            // Add other service types here as needed
            default:
                return null;
        }
    }
}
