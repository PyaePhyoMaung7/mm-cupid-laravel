<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function getUserInfoByUsername(string $username);

    public function getPermissionRoutesByRole(int $role);
}
