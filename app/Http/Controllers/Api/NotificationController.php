<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationRequest;
use App\Http\Resources\NotificationResource;
use Illuminate\Http\JsonResponse;

class NotificationController extends Controller
{
    /**
     * Retrieve all notifications for the authenticated user.
     */
    public function index(): JsonResponse
    {
        $notifications = auth()->user()->notifications()->latest()->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Notifications retrieved successfully.',
            'data' => NotificationResource::collection($notifications),
        ], 200);
    }

}