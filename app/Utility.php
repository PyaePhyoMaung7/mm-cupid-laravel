<?php

namespace App;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class Utility
{
    public static function addCreatedBy($data)
    {
        if (Auth::guard('admin')->user()) {
            $user_id = Auth::guard('admin')->user()->id;
            $data['created_by'] = $user_id;
            $data['updated_by'] = $user_id;
            return $data;
        }
    }

    public static function addUpdatedBy($data)
    {
        if (Auth::guard('admin')->user()) {
            $user_id = Auth::guard('admin')->user()->id;
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['updated_by'] = $user_id;
            return $data;
        }
    }


    public static function addDeletedBy($data)
    {
        if (Auth::guard('admin')->user()) {
            $user_id = Auth::guard('admin')->user()->id;
            $data['deleted_at'] = date('Y-m-d H:i:s');
            $data['deleted_by'] = $user_id;
            return $data;
        }
    }

    public static function memberAddCreatedBy($data)
    {
        if (Auth::guard('member')->user()) {
            $user_id = Auth::guard('member')->user()->id;
            $data['created_by'] = $user_id;
            $data['updated_by'] = $user_id;
            return $data;
        }
    }

    public static function memberAddUpdatedBy($data)
    {
        if (Auth::guard('member')->user()) {
            $user_id = Auth::guard('member')->user()->id;
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['updated_by'] = $user_id;
            return $data;
        }
    }


    public static function memberAddDeletedBy($data)
    {
        if (Auth::guard('member')->user()) {
            $user_id = Auth::guard('member')->user()->id;
            $data['deleted_at'] = date('Y-m-d H:i:s');
            $data['deleted_by'] = $user_id;
            return $data;
        }
    }


    public static function saveDebugLog($screen, $queryLog)
    {
        $formattedQueries = "";
        foreach ($queryLog as $query) {
            $querySql = $query['query'];
            foreach ($query['bindings'] as $binding) {
                $querySql = preg_replace('/\?/', "'" . $binding . "'", $querySql, 1);
            }
            $formattedQueries .= $querySql . PHP_EOL . PHP_EOL;
        }
        Log::info($screen . " - \n" . $formattedQueries);
    }

    public static function saveErrorLog($screen, $error_msg)
    {
        Log::error($screen . " - \n" . $error_msg);
    }

    public static function convertTodmYFormat ($date_time) {
        $timestamps = strtotime($date_time);
        $date       = date('d/m/Y', $timestamps);
        return $date;
    }

    public static function convertToYmdFormat ($date_time) {
        $timestamps = strtotime($date_time);
        $date       = date('Y-m-d', $timestamps);
        return $date;
    }
}
