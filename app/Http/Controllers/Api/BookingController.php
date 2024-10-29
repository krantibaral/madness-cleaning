<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with([
            'windowCleaningService',
            'houseCleaningService',
            'leaseCleaningService',
            'carpetCleaningService',
            'commercialCleaningService',
            'builderCleaningService',
            'lawnService',
            'rubbishRemovalService'
        ])->get();

        // Filter out null services
        $bookings = $bookings->map(function ($booking) {
            return $this->filterNullServices($booking);
        });

        if ($bookings->isEmpty()) {
            return response()->json([
                'status' => 'success',
                'message' => 'No bookings found.',
                'data' => []
            ], 200);
        } else {
            return response()->json([
                'status' => 'success',
                'data' => $bookings,
                'message' => 'All bookings retrieved successfully.'
            ], 200);
        }
    }

    public function show($id)
    {
        // Retrieve the booking by its ID
        $booking = Booking::with([
            'windowCleaningService',
            'houseCleaningService',
            'leaseCleaningService',
            'carpetCleaningService',
            'commercialCleaningService',
            'builderCleaningService',
            'lawnService',
            'rubbishRemovalService'
        ])->find($id);

        if (!$booking) {
            return response()->json([
                'status' => 'error',
                'message' => 'Booking not found.'
            ], 404);
        }

        // Filter out null services
        $booking = $this->filterNullServices($booking);

        return response()->json([
            'status' => 'success',
            'data' => $booking,
            'message' => 'Booking retrieved successfully.'
        ], 200);
    }

    // Helper function to filter out null services and timestamps
    private function filterNullServices($booking)
    {
        $bookingArray = $booking->toArray();

        // Filter out service keys with null values
        foreach ($bookingArray as $key => $value) {
            if (strpos($key, '_service') !== false && is_null($value)) {
                unset($bookingArray[$key]);
            }
        }

        // Unset created_at, updated_at, and deleted_at fields
        unset($bookingArray['created_at'], $bookingArray['updated_at'], $bookingArray['deleted_at']);

        return (object) $bookingArray; // Convert back to object for consistency
    }
}
