<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\RolePermission\PermissionController;
use App\Http\Controllers\RolePermission\RoleController;
use App\Http\Controllers\Test\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/test', [TestController::class, 'returnAllUsers']);



Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);


// admin routes
Route::middleware(['auth:api', 'permission:all_permission'])->group(function () {
    Route::apiResource('users', UserController::class);
    Route::post('users/{user}/assign-role', [UserController::class, 'assignRole']);
    Route::post('roles/{role}/assign-permission', [RoleController::class, 'assignPermission']);
    Route::apiResource('roles', RoleController::class);
    Route::apiResource('permissions', PermissionController::class);
});

// Regular user routes
Route::middleware(['auth:api', 'permission:user_permission'])->group(function () {
    
});



/*===========================
=           customers           =
=============================*/
// Note: This is a test api route
Route::apiResource('/customers', \App\Http\Controllers\API\CustomerController::class);

/*=====  End of customers   ======*/
