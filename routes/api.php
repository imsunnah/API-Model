<?php

use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/students', StudentController::class);
});

/*===========================
=           students           =
=============================*/


/*=====  End of students   ======*/
//  php artisan api:generate Department "name:string|status:integer|slug:string:nullable|description:string:nullable" --all
