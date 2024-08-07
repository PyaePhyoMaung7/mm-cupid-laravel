<?php

namespace App\Repositories\Hobby;

use App\Utility;
use App\Constant;
use App\Models\Hobby;
use App\ReturnMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Hobby\CityRepositoryInterface;

class HobbyRepository implements HobbyRepositoryInterface
{
    public function store(array $data)
    {
        $returned_array         = [];
        $insert_data            = [];
        $insert_data['name']    = $data['name'];
        $data                   = Utility::addCreatedBy($insert_data);
        $result                 = Hobby::create($data);
        if ($result) {
            $returned_array['status']   = ReturnMessage::OK;
        } else {
            $returned_array['status']   = ReturnMessage::INTERNAL_SERVER_ERROR;
        }
        return $returned_array;
    }

    public function getHobbies()
    {
        $hobbies = Hobby::whereNull('deleted_at')
                        ->orderBy('id', 'DESC')
                        ->paginate(Constant::RECORD_PER_LIST);
        return $hobbies;
    }

    public function apigetHobbies ()
    {
        $hobbies = Hobby::select('id', 'name')
                        ->whereNull('deleted_at')
                        ->get();
        return $hobbies;
    }

    public function getHobbyById(int $id)
    {
        $hobby = Hobby::select('id','name')
                        ->find($id);
        return $hobby;
    }

    public function update(array $data)
    {
        $returned_array         = [];
        $id                     = $data['id'];
        $update_data            = [];
        $update_data['name']    = $data['name'];
        $data                   = Utility::addUpdatedBy($update_data);
        $paramObj               = Hobby::find($id);
        $result                 = $paramObj->update($data);
        if ($result) {
            $returned_array['status']   = ReturnMessage::OK;
        } else {
            $returned_array['status']   = ReturnMessage::INTERNAL_SERVER_ERROR;
        }
        return $returned_array;
    }

    public function delete(int $id)
    {
        $returned_array         = [];
        $delete_data           = [];
        $data                   = Utility::addDeletedBy($delete_data);
        $paramObj               = Hobby::find($id);
        $result                 = $paramObj->update($data);
        if ($result) {
            $returned_array['status']   = ReturnMessage::OK;
        } else {
            $returned_array['status']   = ReturnMessage::INTERNAL_SERVER_ERROR;
        }
        return $returned_array;
    }

}
