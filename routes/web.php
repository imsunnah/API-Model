<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// Unauthenticated routes
Route::group(['middleware' => ['logoutIfNotAuthenticated']], function () {
    // Define routes here
    Route::get('/', function () {
        return view('welcome');
    });
});
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated routes
Route::middleware('auth:web', 'permission:all_permission')->group(function () {

    Route::get('/dashboard', [BackendController::class, 'index']);
    Route::get('/backend-dashboard', [BackendController::class, 'index']);
    Route::get('/user-list', [App\Http\Controllers\Backend\User\UserController::class, 'index'])->name('user-list');
    Route::get('/user-store', [App\Http\Controllers\Backend\User\UserController::class, 'store'])->name('user-store');
    Route::post('new-user-registration', [App\Http\Controllers\Backend\User\UserController::class, 'newUserRegistration'])->name('new-user-registration');
    Route::post('user-update', [App\Http\Controllers\Backend\User\UserController::class, 'userUpdate'])->name('user-update');
    Route::get('/delete-user/{id}', [App\Http\Controllers\Backend\User\UserController::class, 'deleteUser']);


    // Permission Web routes
    Route::get('/permission-list', [App\Http\Controllers\Backend\Permission\PermissionController::class, 'index'])->name('permission-list');
    Route::post('new-permission-store', [App\Http\Controllers\Backend\Permission\PermissionController::class, 'newPermissionStore'])->name('new-permission-store');
    Route::post('/permission-update', [App\Http\Controllers\Backend\Permission\PermissionController::class, 'permisssionUpdate'])->name('permission-update');
    Route::get('/delete-permission/{id}', [App\Http\Controllers\Backend\Permission\PermissionController::class, 'deletePermission']);
    
    // Role Web routes
    Route::get('/role-list', [App\Http\Controllers\Backend\Role\RoleController::class, 'index'])->name('role-list');
    Route::post('new-role-store', [App\Http\Controllers\Backend\Role\RoleController::class, 'newRoleStore'])->name('new-role-store');
    Route::post('/role-update', [App\Http\Controllers\Backend\Role\RoleController::class, 'roleUpdate'])->name('role-update');
    Route::get('/delete-role/{id}', [App\Http\Controllers\Backend\Role\RoleController::class, 'deleteRole']);


    // Role permission mapping Web routes
    Route::get('/role-permission-list', [App\Http\Controllers\Backend\RolePermissionController::class, 'index'])->name('role-permission-list');
    Route::post('/get-user-roles', [App\Http\Controllers\Backend\RolePermissionController::class, 'getUserRoles'])->name('get-user-roles');
    Route::post('/get-role-permissions', [App\Http\Controllers\Backend\RolePermissionController::class, 'getRolePermissions'])->name('get-role-permissions');
    Route::post('/update-user-role', [App\Http\Controllers\Backend\RolePermissionController::class, 'assignRole'])->name('update-user-role');
    Route::post('/update-role-permission', [App\Http\Controllers\Backend\RolePermissionController::class, 'updateRolePermission'])->name('update-role-permission');

});


Route::middleware('auth:web', 'permission:user_permission')->group(function () {

});

require __DIR__.'/auth.php';





