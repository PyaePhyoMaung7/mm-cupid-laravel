<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function getUserInfoByUsername(string $username);

    public function getPermissionRoutesByRole(int $role);

    public function store(array $data);

    public function getUsers();

    public function getUserById(int $id);

    // public function update(array $data);
}
