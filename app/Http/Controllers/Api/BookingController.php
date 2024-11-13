<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Make sure to import Auth

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
        ])->where('user_id', Auth::id())

            ->get();

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
        // Retrieve the booking by its ID for the authenticated user
        $booking = Booking::with([
            'windowCleaningService',
            'houseCleaningService',
            'leaseCleaningService',
            'carpetCleaningService',
            'commercialCleaningService',
            'builderCleaningService',
            'lawnService',
            'rubbishRemovalService'
        ])->where('user_id', Auth::id()) // Filter by authenticated user ID
            ->find($id);

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
    public function destroy($id)
    {

        $booking = Booking::where('user_id', Auth::id())->find($id);


        if (!$booking) {
            return response()->json([
                'status' => 'error',
                'message' => 'Booking not found.'
            ], 404);
        }


        if ($booking->window_cleaning_service_id) {
            \App\Models\WindowsCleaningService::where('id', $booking->window_cleaning_service_id)->forceDelete();
        }

        if ($booking->house_cleaning_service_id) {
            \App\Models\HouseCleaningService::where('id', $booking->house_cleaning_service_id)->forceDelete();
        }

        if ($booking->lease_cleaning_service_id) {
            \App\Models\LeaseCleaning::where('id', $booking->lease_cleaning_service_id)->forceDelete();
        }

        if ($booking->carpet_cleaning_service_id) {
            \App\Models\CarpetCleaningService::where('id', $booking->carpet_cleaning_service_id)->forceDelete();
        }

        if ($booking->commercial_cleaning_service_id) {
            \App\Models\CommercialCleaningService::where('id', $booking->commercial_cleaning_service_id)->forceDelete();
        }

        if ($booking->builder_cleaning_service_id) {
            \App\Models\BuilderCleaningService::where('id', $booking->builder_cleaning_service_id)->forceDelete();
        }

        if ($booking->lawn_service_id) {
            \App\Models\LawnService::where('id', $booking->lawn_service_id)->forceDelete();
        }

        if ($booking->rubbish_removal_service_id) {
            \App\Models\RubbishRemovalService::where('id', $booking->rubbish_removal_service_id)->forceDelete();
        }

        // Delete the booking itself
        $booking->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Booking and its related services deleted successfully.'
        ], 200);
    }




    private function filterNullServices($booking)
    {
        $bookingArray = $booking->toArray();

        foreach ($bookingArray as $key => $value) {
            if (strpos($key, '_service') !== false && is_null($value)) {
                unset($bookingArray[$key]);
            }
        }

        unset($bookingArray['created_at'], $bookingArray['updated_at'], $bookingArray['deleted_at']);

        return (object) $bookingArray;
    }
}
