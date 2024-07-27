<?php

namespace App\Repositories\City;

use App\Utility;
use App\Constant;
use App\Models\City;
use App\ReturnMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\City\CityRepositoryInterface;

class CityRepository implements CityRepositoryInterface
{
    public function store(array $data)
    {
        $returned_array         = [];
        $insert_data            = [];
        $insert_data['name']    = $data['name'];
        $data                   = Utility::addCreatedBy($insert_data);
        $result                 = City::create($data);
        if ($result) {
            $returned_array['status']   = ReturnMessage::OK;
        } else {
            $returned_array['status']   = ReturnMessage::INTERNAL_SERVER_ERROR;
        }
        return $returned_array;
    }

    public function getCities ()
    {
        $cities = City::select('id', 'name')
                ->whereNull('deleted_at')
                ->orderBy('id', 'DESC')
                ->paginate(Constant::RECORD_PER_LIST);
        return $cities;
    }

    public function apiGetCities ()
    {
        $cities = City::select('id', 'name')
                ->whereNull('deleted_at')
                ->orderBy('name', 'ASC')
                ->get();
        return $cities;
    }

    public function getCityById(int $id)
    {
        $city = City::find($id);
        return $city;
    }

    public function update(array $data)
    {
        $returned_array         = [];
        $id                     = $data['id'];
        $update_data            = [];
        $update_data['name']    = $data['name'];
        $data                   = Utility::addUpdatedBy($update_data);
        $paramObj               = City::find($id);
        $result                 = $paramObj->update($data);
        if ($result) {
            $returned_array['status']   = ReturnMessage::OK;
        } else {
            $returned_array['status']   = ReturnMessage::INTERNAL_SERVER_ERROR;
        }
        return $returned_array;
    }

}
