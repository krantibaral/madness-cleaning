<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserLogin;
use App\Http\Resources\AuthResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Requests\UserRegistration;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePasswordRequest;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function register(UserRegistration $request)
    {
        try {
            // Hash the password before storing it
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);

            // Create the user
            $user = User::create($input);

            // Handle avatar file upload if exists
            if ($request->hasFile('avatar')) {
                $user->addMedia($request->file('avatar'))->toMediaCollection('avatars');
            }

            // Generate access token
            $user->access_token = $user->createToken($request->email)->accessToken;
            $user->responseMessage = "User successfully registered.";

            return new AuthResource($user);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'User registration failed.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function login(UserLogin $request)
    {

        $login_credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (auth()->attempt($login_credentials)) {
            $user_login_token = auth()->user()->createToken($request->email)->accessToken;
            $user = auth()->user();
            $user->access_token = $user_login_token;
            $user->responseMessage = "Login Successful";
        } else {
            return response(['success' => false, "message" => "Login Failed.", "data" => []], 400);
        }
        return new AuthResource($user);
    }

    public function logoutUser()
    {
        try {
            $user = auth()->user();
            auth()->user()->token()->revoke();
        } catch (\Exception $exception) {
            return response(['success' => false, "message" => "Logout unsuccessfull.", "data" => []], 400);
        }
        return response(['success' => true, "message" => "Logout successfull", "data" => []], 200);
    }
    public function updateUser(Request $request)
    {
        // Retrieve the currently authenticated user
        $user = auth()->user();

        // Validate the incoming request data if necessary
        $input = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|max:255',
            'phone' => 'sometimes',
            'address' => 'sometimes|string'

        ]);

        // Update the user details if any input is provided
        if (!empty($input)) {
            $user->update($input);
        }

        // Handle avatar file upload if exists
        if ($request->hasFile('avatar')) {
            // Clear previous avatar
            $user->clearMediaCollection('avatars');

            // Add the new avatar
            $user->addMedia($request->file('avatar'))->toMediaCollection('avatars');
        }

        // Response message after successful update
        $user->responseMessage = "User details updated successfully.";

        return new AuthResource($user);
    }


    public function getAuthUser()
    {

        $user = auth()->user();


        if ($user) {
            return new AuthResource($user);
        }

        return response()->json([
            'success' => false,
            'message' => 'User not authenticated.'
        ], 401);
    }


}