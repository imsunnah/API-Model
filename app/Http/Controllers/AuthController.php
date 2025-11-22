<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash, Validator};
use App\Models\User;
use Essa\APIToolKit\Api\ApiResponse;

class AuthController extends Controller
{
    use ApiResponse;

public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name'     => 'required',
        'email'    => 'required|email|unique:users',
        'password' => 'required|min:6'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'message' => 'Please use proper data.',
            'errors'  => $validator->errors(),
        ], 422);
    }

    $validated = $validator->validated();

    $user = User::create([
        'name'     => $validated['name'],
        'email'    => $validated['email'],
        'password' => Hash::make($validated['password'])
    ]);

    return response()->json([
        'message' => 'User registered successfully',
        'user'    => $user
    ], 201);
}

    public function login(Request $request)
    {

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = Auth::user()->createToken('api_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => Auth::user()
        ]);
    }

    public function user(Request $request)
    {
        return $request->user();
    }

public function logout(Request $request)
{
    $user = $request->user();

    if ($user && $user->currentAccessToken()) {
        // Delete the current token
        $user->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }

    // Fallback if no token found
    return response()->json(['message' => 'No token found or already logged out'], 400);
}

}
