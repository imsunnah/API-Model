<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Essa\APIToolKit\Api\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    use ApiResponse;


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // $role = Role::where('name', 'General User')->first();

        // $permission = Permission::where('name', 'user_permission')->first();

        // if (!$role->permissions->contains($permission)) {
        //     $role->permissions()->attach($permission);
        // }

        // $role = Role::where('name', $role->name)->first();

        // $user->assignRole($role);

        return $this->responseSuccess('User created successfully', $user);
    }

    // Login and issue token
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('laravel-api-dev-model')->accessToken;

            $data = [
                'user' => $user,
                'token' => $token
            ];

            return $this->responseSuccess('User logged in successfully', $data);


        } else {
            return $this->responseWithCustomError('Error', 'Something went wrong', 422);
        }
    }
}
