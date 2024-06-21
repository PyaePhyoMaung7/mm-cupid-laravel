<?php

namespace App\Repositories\User;

use App\Utility;
use App\Constant;
use App\Models\User;
use App\ReturnMessage;
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

    public function store(array $data)
    {
        $returned_array         = [];
        $insert_data            = [];
        $insert_data['username']    = $data['username'];
        $insert_data['password']    = bcrypt($data['password']);
        $insert_data['role']        = $data['role'];
        $insert_data['status']      = Constant::ADMIN_ENABLE_STATUS;

        $data                       = Utility::addCreatedBy($insert_data);
        $result                     = User::create($data);
        if ($result) {
            $returned_array['status']   = ReturnMessage::OK;
        } else {
            $returned_array['status']   = ReturnMessage::INTERNAL_SERVER_ERROR;
        }
        return $returned_array;
    }

    public function getUsers()
    {
        $users = User::select('id', 'username', 'role', 'status')
                ->whereNull('deleted_at')
                ->orderBy('id', 'DESC')
                ->paginate('5');
        return $users;
    }

    public function getUserById(int $id)
    {
        $user = User::find($id);
        return $user;
    }
}
