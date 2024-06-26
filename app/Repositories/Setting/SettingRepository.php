<?php

namespace App\Repositories\Setting;

use App\Utility;
use App\ReturnMessage;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Repositories\City\CityRepositoryInterface;

class SettingRepository implements SettingRepositoryInterface
{
    public function setSiteSetting()
    {
        $setting = Setting::select('company_name', 'company_logo')->first();

        if ($setting == null) {
            Session::put(['site_title' => 'MM Cupid']);
            Session::put(['site_logo' => 'cupid.jpg']);
        } else {
            Session::put(['site_title' => $setting['company_name']]);
            Session::put(['site_logo' => $setting['company_logo']]);
        }
    }

    public function getSetting()
    {
        $setting = Setting::first();
        return $setting;
    }

    public function store(array $data)
    {
        $returned_array                 = [];
        $insert_data                    = [];
        $insert_data['point']           = $data['point'];
        $insert_data['company_name']    = $data['company-name'];
        $insert_data['company_email']   = $data['company-email'];
        $insert_data['company_phone']   = $data['company-phone'];
        $insert_data['company_address'] = $data['company-address'];

        if (isset($data['company-logo'])) {
            $file                       = $data['company-logo'];
            $file_name                  = uniqid() . time() . '_' . $file->getClientOriginalName();
            $destination_path           = public_path('assets/default_images/' . $file_name);
            Utility::cropAndResizeImage($data['company-logo'], $destination_path, 50, 50);
            $insert_data['company_logo']= $file_name;
        }
        $data                           = Utility::addCreatedBy($insert_data);
        $result                         = Setting::create($data);

        if ($result) {
            $returned_array['status']   = ReturnMessage::OK;
            $this->setSiteSetting();
        } else {
            $returned_array['status']   = ReturnMessage::INTERNAL_SERVER_ERROR;
        }
        return $returned_array;
    }

    public function update(array $data)
    {
        $returned_array                 = [];
        $update_data                    = [];
        $id                             = $data['id'];
        $update_data['point']           = $data['point'];
        $update_data['company_name']    = $data['company-name'];
        $update_data['company_email']   = $data['company-email'];
        $update_data['company_phone']   = $data['company-phone'];
        $update_data['company_address'] = $data['company-address'];

        if (isset($data['company-logo'])) {
            $old_logo = Setting::find($id)->value('company_logo');
            if ($old_logo) {
                $old_logo_path = public_path('assets/default_images') . '/' . $old_logo;
                if (file_exists($old_logo_path)) {
                    unlink($old_logo_path);
                }
            }

            $file                       = $data['company-logo'];
            $file_name                  = uniqid() . time() . '_' . $file->getClientOriginalName();
            $destination_path           = public_path('assets/default_images/' . $file_name);
            Utility::cropAndResizeImage($data['company-logo'], $destination_path, 50, 50);
            $update_data['company_logo']= $file_name;
        }

        $data                           = Utility::addUpdatedBy($update_data);
        $paramObj                       = Setting::find($id);
        $result                         = $paramObj->update($data);

        if ($result) {
            $returned_array['status']   = ReturnMessage::OK;
            $this->setSiteSetting();
        } else {
            $returned_array['status']   = ReturnMessage::INTERNAL_SERVER_ERROR;
        }
        return $returned_array;
    }
}
