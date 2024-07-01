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

    public static function cropAndResizeImage($src_image_path, $dest_image_path, $new_width, $new_height)
    {

        list($original_width, $original_height, $image_type) = getimagesize($src_image_path);

        switch ($image_type) {
            case IMAGETYPE_JPEG:
                $original_image = imagecreatefromjpeg($src_image_path);
                break;
            case IMAGETYPE_PNG:
                $original_image = imagecreatefrompng($src_image_path);
                break;
            case IMAGETYPE_GIF:
                $original_image = imagecreatefromgif($src_image_path);
                break;
            default:
                $original_image = imagecreatefromstring(file_get_contents($src_image_path));
                break;
        }

        $original_aspect_ratio = $original_width / $original_height;
        $new_aspect_ratio = $new_width / $new_height;

        if ($original_aspect_ratio > $new_aspect_ratio) {
            $crop_height = $original_height;
            $crop_width = $original_height * $new_aspect_ratio;
        } else {
            $crop_width = $original_width;
            $crop_height = $original_width / $new_aspect_ratio;
        }

        // Perform cropping
        $crop_x = ($original_width - $crop_width) / 2;
        $crop_y = ($original_height - $crop_height) / 2;

        $cropped_image = imagecrop($original_image, ['x' => $crop_x, 'y' => $crop_y, 'width' => $crop_width, 'height' => $crop_height]);


        $new_image = imagecreatetruecolor($new_width, $new_height);

        imagecopyresampled(
            $new_image, // Destination image
            $cropped_image, // Source image
            0, // Destination X coordinate
            0, // Destination Y coordinate
            0, // Source X coordinate
            0, // Source Y coordinate
            $new_width, // Destination width
            $new_height, // Destination height
            $crop_width, // Source width
            $crop_height // Source height
        );

        switch ($image_type) {
            case IMAGETYPE_JPEG:
                imagejpeg($new_image, $dest_image_path);
                break;
            case IMAGETYPE_PNG:
                imagepng($new_image, $dest_image_path);
                break;
            case IMAGETYPE_GIF:
                imagegif($new_image, $dest_image_path);
                break;
            default:
                imagejpeg($new_image, $dest_image_path);
                break;
        }

        // Free up memory
        imagedestroy($new_image);
        imagedestroy($original_image);
    }
}
