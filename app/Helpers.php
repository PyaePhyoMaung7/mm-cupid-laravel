<?php

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
