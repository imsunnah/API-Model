<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        // dd('hello');
        $users = $this->userRepository->usersWithRoles();
        $allRoles = Role::all();
        return view('backendDashboard.user.index', compact('users', 'allRoles'));
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
        if ($user) {
            $users = $this->userRepository->usersWithRoles();
            $allRoles = Role::all();
            return view('backendDashboard.user.index', compact('users', 'allRoles'));
        } else {
            return response()->json(['message' => 'User not created.'], 500);
        }
        
    }

    public function newUserRegistration(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->string('password')),
        ]);

        // Attaching permission to role
        $role = Role::where('name', 'General User')->first();

        // Find the permission
        $permission = Permission::where('name', 'user_permission')->first();

        // Attach the permission to the role if not already assigned
        if (!$role->permissions->contains($permission)) {
            $role->permissions()->attach($permission);
        }

        // Find the role
        $role = Role::where('name', $role->name)->first();

        // Assign the role to the user
        $user->assignRole($role);

        $users = $this->userRepository->usersWithRoles();

        $allRoles = Role::all();
        
        return view('backendDashboard.user.index', compact('users', 'allRoles'));
    }

    public function userUpdate(Request $request)
    {
        $request->validate([
            'id' => ['required', 'integer', 'exists:'.User::class],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class.',email,'.$request->id],
            'password' => ['nullable', 'min:8'],
        ]);



        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        
        return redirect()->route('user-list');
    }


    // Delete a user by ID
    public function deleteUser($id)
    {
        $user = $this->userRepository->getUserById($id);

        // Check if the user is a super admin
        if ($user->hasPermissionTo('Super Admin')) {
            return redirect()->route('user-list');
        }

        $this->userRepository->deleteUser($id);
        return redirect()->route('user-list');
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
