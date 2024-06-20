<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Repositories\User\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getUserInfoByUsername(string $username)
    {
        $userInfo   = User::SELECT('password', 'status', 'deleted_at')
                    ->WHERE('username', '=', $username)
                    ->first();
        return $userInfo;
    }

    public function getPermissionRoutesByRole(int $role)
    {
        $permission = DB::SELECT('SELECT name FROM route_permission WHERE role = ' . $role);
        return $permission;
    }

}
