<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\Hobby;
use App\Models\Member;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CityStoreRequest;
use App\Http\Requests\CityUpdateRequest;

// use Illuminate\Http\Requests\CityStoreRequest;

class TestController extends Controller
{
    //
    public function index()
    {
        $name   = 'Pyae Phyo';
        $age    = 21;
        $cities = City::SELECT("id", "name")
                    ->orderBy('id', 'DESC')
                    ->where('deleted_at', null)
                    ->get();

        $members = Member::SELECT("id", "username", "city_id")
                    ->with("getCityByMember")
                    ->orderBy('id', 'DESC')
                    ->where('deleted_at', null)
                    ->get();

        return view('test.test', compact([
            'cities',
            'members'
        ]));
    }

    public function postFormStore(CityStoreRequest $request)
    {
        $create = [];
        $create['name'] = $request->get('city');
        $create['created_by'] = 1;
        $create['updated_by'] = 1;
        City::create($create);

        return redirect('test');
    }

    public function postFormUpdate(CityUpdateRequest $request)
    {
        $city   = $request->get('city');
        $id     = $request->get('id');
        $update = [];
        $update['name'] = $city;
        City::find($id)->update($update);

        return redirect('test');
    }

    public function edit($id)
    {
        $cities = City::SELECT("id", "name")
                    ->orderBy('id', 'DESC')
                    ->where('deleted_at', null)
                    ->get();

        $edit_city = City::find($id);

        $members = Member::SELECT("id", "username", "city_id")
                    ->with("getCityByMember")
                    ->orderBy('id', 'DESC')
                    ->where('deleted_at', null)
                    ->get();

        return view('test.test', compact([
            'cities',
            'edit_city',
            'members'
        ]));
    }

    public function delete($id)
    {
        //hard delete
        // City::find($id)->delete();

        //soft delete
        $delete_data = [];
        $delete_data['deleted_at'] = date('Y-m-d H:i:s');
        $delete_data['deleted_by'] = 1;
        $delete = City::find($id);
        $delete->update($delete_data);

        return redirect('test');
    }
}
