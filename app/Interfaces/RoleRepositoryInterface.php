<?php

namespace App\Interfaces;

interface RoleRepositoryInterface
{
    public function getAllRoles();
    public function getRoleById($id);
    public function getRolePermissions($id);
    public function createRole(array $data);
    public function updateRole($id, array $data);
    public function deleteRole($id);
}
