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
}
