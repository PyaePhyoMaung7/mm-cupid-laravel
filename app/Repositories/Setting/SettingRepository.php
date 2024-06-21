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
    public function setSiteSetting ()
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
}
