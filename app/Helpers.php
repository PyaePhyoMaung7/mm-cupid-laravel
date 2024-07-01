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

if (!function_exists("getAdminStatus")) {
    function getAdminStatus($status)
    {
        switch ($status) {
            case 'enable':
                return Constant::ADMIN_ENABLE_STATUS;
            case 'disable':
                return Constant::ADMIN_DISABLE_STATUS;
            default:
                return -1;
        }
    }
}

if (!function_exists("userIsActive")) {
    function userIsActive($status)
    {
        return $status == Constant::ADMIN_ENABLE_STATUS;
    }
}

if (!function_exists("memberAccActivated")) {
    function memberAccActivated($status)
    {
        return $status == Constant::MEMBER_EMAIL_VERIFIED;
    }
}
