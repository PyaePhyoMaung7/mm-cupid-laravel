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

if (!function_exists("getFifteenChars")) {
    function getFifteenChars($string)
    {
        if (strlen($string) > 15) {
            return substr($string, 0, 15) . "...";
        }
        return $string;
    }
}

if (!function_exists("getReligion")) {
    function getReligion($name)
    {
        $religion = Constant::RELIGION_OTHER;

        switch ($name) {
            case 'christian':
                $religion = Constant::RELIGION_CHRISTIAN;
                break;
            case 'islam':
                $religion = Constant::RELIGION_ISLAM;
                break;
            case 'buddhist':
                $religion = Constant::RELIGION_BUDDHIST;
                break;
            case 'hindu':
                $religion = Constant::RELIGION_HINDU;
                break;
            case 'jain':
                $religion = Constant::RELIGION_JAIN;
                break;
            case 'shinto':
                $religion = Constant::RELIGION_SHINTO;
                break;
            case 'atheist':
                $religion = Constant::RELIGION_ATHEIST;
                break;
            case 'other':
                $religion = Constant::RELIGION_OTHER;
                break;
        }

        return $religion;
    }
}


if (!function_exists("getPartnerGender")) {
    function getPartnerGender($name)
    {
        $partner_gender = Constant::PARTNER_GENDER_BOTH;

        switch ($name) {
            case 'male':
                $partner_gender = Constant::PARTNER_GENDER_MALE;
                break;
            case 'female':
                $partner_gender = Constant::PARTNER_GENDER_FEMALE;
                break;
            default:
                $partner_gender = Constant::PARTNER_GENDER_BOTH;
                break;
        }

        return $partner_gender;
    }
}

if (!function_exists("getGender")) {
    function getGender($name)
    {
        $gender = Constant::UNDEFINED_GENDER;

        switch ($name) {
            case 'male':
                $gender = Constant::MALE;
                break;
            case 'female':
                $gender = Constant::FEMALE;
                break;
            default:
                $gender = Constant::UNDEFINED_GENDER;
                break;
        }

        return $gender;
    }
}

if (!function_exists("getVerificationStatus")) {
    function getVerificationStatus($name)
    {
        $status = Constant::MEMBER_UNVERIFIED;

        switch ($name) {
            case 'email':
                $status = Constant::MEMBER_EMAIL_VERIFIED;
                break;
            case 'pending':
                $status = Constant::MEMBER_VERIFICATION_PENDING;
                break;
            case 'denied':
                $status = Constant::MEMBER_VERIFICATION_DENIED;
                break;
            case 'verified':
                $status = Constant::MEMBER_VERIFIED;
                break;
            case 'banned':
                $status = Constant::MEMBER_BANNED;
                break;
            default:
                $status = Constant::MEMBER_UNVERIFIED;
                break;
        }

        return $status;
    }
}
