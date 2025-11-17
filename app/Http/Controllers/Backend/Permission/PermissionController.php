<?php

namespace App\Http\Controllers\Backend\Permission;

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
        return view('backendDashboard.permission.index', compact('permissions'));
    }

    // Get a single permission by ID
    public function show($id)
    {
        $permission = $this->permissionRepository->getPermissionById($id);
        return response()->json($permission);
    }

    // Create a new permission
    public function newPermissionStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $permission = $this->permissionRepository->createPermission($data);

        return redirect()->route('permission-list');
    }

    // Update a permission by ID
    public function permisssionUpdate(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|integer',
            'name' => 'nullable|string|max:255',
        ]);

        $permission = $this->permissionRepository->updatePermission($request->id, $data);
        return redirect()->route('permission-list');
    }

    // Delete a permission by ID
    public function deletePermission($id)
    {
        $permission = $this->permissionRepository->deletePermission($id);
        return redirect()->route('permission-list');
    }
}
