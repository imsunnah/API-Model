<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Models\User;
use Essa\APIToolKit\Api\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TestController extends Controller
{
    use ApiResponse;

    public function returnAllUsers()
    {
        $users = Cache::remember('active_users', 60, function () {
            return User::all();
        });
        if ($users->count() > 0) {
            return $this->responseSuccess($users, 'Users retrieved successfully');
        }
        return $this->responseNotFound('No users found', 'No data found');
    }
}
