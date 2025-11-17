<?php

namespace App\Http\Controllers\RolePermission;

use App\Http\Controllers\Controller;
use App\Interfaces\RoleRepositoryInterface;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    // Get all roles
    public function index()
    {
        $roles = $this->roleRepository->getAllRoles();
        return response()->json($roles);
    }

    // Get a single role by ID
    public function show($id)
    {
        $role = $this->roleRepository->getRoleById($id);
        return response()->json($role);
    }

    // Create a new role
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $role = $this->roleRepository->createRole($data);
        return response()->json($role, 201);
    }

    // Update a role by ID
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:255',
        ]);

        $role = $this->roleRepository->updateRole($id, $data);
        return response()->json($role);
    }

    // Delete a role by ID
    public function destroy($id)
    {
        $role = $this->roleRepository->deleteRole($id);
        return response()->json(['message' => 'Role deleted successfully']);
    }


    public function assignPermission(Request $request, $roleId)
    {
        // Validate the permission input
        $validated = $request->validate([
            'permission' => 'required|string|exists:permissions,name',  // Validate that the permission exists
        ]);

        // Find the role by ID
        $role = Role::find($roleId);

        // Check if the role exists
        if (!$role) {
            return response()->json(['message' => 'Role not found.'], 404);
        }

        // Find the permission
        $permission = Permission::where('name', $validated['permission'])->first();

        // Check if the permission exists
        if (!$permission) {
            return response()->json(['message' => 'Permission not found.'], 404);
        }

        // Attach the permission to the role if not already assigned
        if (!$role->permissions->contains($permission)) {
            $role->permissions()->attach($permission);
        }

        // Return success response
        return response()->json(['message' => 'Permission assigned successfully to the role.'], 200);
    }
}
