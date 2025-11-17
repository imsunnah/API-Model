<?php

namespace App\Http\Controllers\RolePermission;

use App\Http\Controllers\Controller;
use App\Interfaces\PermissionRepositoryInterface;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }


    // Get all permissions
    public function index()
    {
        $permissions = $this->permissionRepository->getAllPermissions();
        return response()->json($permissions);
    }

    // Get a single permission by ID
    public function show($id)
    {
        $permission = $this->permissionRepository->getPermissionById($id);
        return response()->json($permission);
    }

    // Create a new permission
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $permission = $this->permissionRepository->createPermission($data);
        return response()->json($permission, 201);
    }

    // Update a permission by ID
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:255',
        ]);

        $permission = $this->permissionRepository->updatePermission($id, $data);
        return response()->json($permission);
    }

    // Delete a permission by ID
    public function destroy($id)
    {
        $permission = $this->permissionRepository->deletePermission($id);
        return response()->json(['message' => 'Permission deleted successfully']);
    }
}
