<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getAllUsers();
        return response()->json($users);
    }

    public function show($id)
    {
        $user = $this->userRepository->getUserById($id);
        return response()->json($user);
    }

    // Create a new user
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = $this->userRepository->createUser($data);
        return response()->json($user, 201);
    }

    // Update a user by ID
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'password' => 'nullable|string|min:6',
        ]);

        $user = $this->userRepository->updateUser($id, $data);
        return response()->json($user);
    }

    // Delete a user by ID
    public function destroy($id)
    {
        $user = $this->userRepository->deleteUser($id);
        return response()->json(['message' => 'User deleted successfully']);
    }

    // Assign a role to a user
    public function assignRole(Request $request, $userId)
    {
        // Validate the role input
        $validated = $request->validate([
            'role' => 'required|string|exists:roles,name',  // Validate that the role exists
        ]);

        // Find the user by ID
        $user = User::find($userId);

        // Check if the user exists
        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        // Find the role
        $role = Role::where('name', $validated['role'])->first();

        // Check if the role exists
        if (!$role) {
            return response()->json(['message' => 'Role not found.'], 404);
        }

        // Assign the role to the user
        $user->assignRole($role);

        // Return success response
        return response()->json(['message' => 'Role assigned successfully.'], 200);
    }
}
