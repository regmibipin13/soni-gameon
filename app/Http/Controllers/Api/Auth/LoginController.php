<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getProfile()
    {
        if (auth('api')->check()) {
            return response()->json(['data' => auth('api')->user()]);
        } else {
            return response()->json(['error' => 'User Not Found']);
        }
    }
    public function register(Request $request)
    {
        $sanitized = $request->validate([
            'name' => 'required',
            'email' => ['required', 'unique:users'],
            'phone' => ['required', 'unique:users'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        $user = User::create($sanitized);

        if ($user) {
            $user->token = $user->createToken('API Token')->accessToken;
            return response()->json([
                'status' => 'success',
                'message' => 'User Registered Successfully',
                'data' => $user,
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'User Registration Failed',
                'data' => [],
            ], 400);
        }
    }

    public function login(Request $request)
    {
        $sanitized = $request->validate([
            'email' => 'required | string | email',
            'password' => 'required',
        ]);

        if (auth()->attempt($sanitized)) {
            $user = User::where('email', $sanitized['email'])->firstOrFail();
            $user->token = $user->createToken('API Token')->accessToken;
            return response()->json([
                'status' => 'success',
                'message' => 'User Logged In Successfully',
                'data' => $user,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 402);
        }
    }

    public function loginWithOtp(Request $request)
    {
        $sanitized = $request->validate([
            'phone' => 'required',
        ]);
        $user = User::where('phone', $sanitized['phone'])->first();
        if ($user) {
            $user->token = $user->createToken('API Token')->accessToken;
            return response()->json([
                'status' => 'success',
                'message' => 'User Logged In Successfully',
                'data' => $user,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 402);
        }
    }

    public function cities()
    {
        return response()->json([
            'data' => Vendor::CITIES
        ]);
    }
}
