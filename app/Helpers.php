<?php

use App\Constant;
use Illuminate\Support\Facades\Session;

if (!function_exists("getMembersByCity")) {
    function getMembersByCity($members)
    {
        $member_res = "";
        foreach ($members as $member) {
            $member_res .= $member->username . ", ";
        }
        $member_res = rtrim($member_res, ", ");
        return $member_res;
    }
}

if (!function_exists("showSection")) {
    function showSection($routeGroup)
    {
        $permissions = Session::get('permission');
        foreach ($permissions as $permission) {
            if ($permission->name == $routeGroup) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists("getUserRole")) {
    function getUserRole($userRole)
    {
        switch ($userRole) {
            case 'admin' :
                return Constant::ADMIN_ROLE;
            case 'editor' :
                return Constant::EDITOR_ROLE;
            case 'customer_service' :
                return Constant::CUSTOMER_SERVICE_ROLE;
            default:
                return '';
        }
    }
}

if (!function_exists("getUserRoleName")) {
    function getUserRoleName($userRole)
    {
        switch ($userRole) {
            case Constant::ADMIN_ROLE :
                return 'admin';
            case Constant::EDITOR_ROLE :
                return 'editor';
            case Constant::CUSTOMER_SERVICE_ROLE:
                return 'customer_service';
            default:
                return 'others';
        }
    }
}
