<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Interfaces\PermissionRepositoryInterface;
use App\Models\Permission;

//use Your Model

/**
 * Class PermissionRepository.
 */
class PermissionRepository implements PermissionRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
    }

    public function getAllPermissions()
    {
        return Permission::all();
    }

    public function getPermissionById($id)
    {
        return Permission::findOrFail($id);
    }

    public function createPermission(array $data)
    {
        return Permission::create($data);
    }

    public function updatePermission($id, array $data)
    {
        $permission = Permission::findOrFail($id);
        $permission->update($data);
        return $permission;
    }

    public function deletePermission($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return $permission;
    }
}
