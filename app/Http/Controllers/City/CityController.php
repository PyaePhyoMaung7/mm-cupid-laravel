<?php

namespace App\Http\Controllers\City;

use App\Utility;
use App\ReturnMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\CityStoreRequest;
use App\Http\Requests\CityUpdateRequest;
use App\Repositories\City\CityRepositoryInterface;

class CityController extends Controller
{
    private $cityRepository;
    public function __construct(CityRepositoryInterface $cityRepository)
    {
        $this->cityRepository = $cityRepository;
        DB::connection()->enableQueryLog();
    }

    public function create()
    {
        try {
            return view('backend.city.form');
        } catch (\Exception $e) {
            Utility::saveErrorLog("CityController::create", $e->getMessage());
            abort(500);
        }
    }

    public function store(CityStoreRequest $request)
    {
        try {
            $result = $this->cityRepository->store((array) $request->all());
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("CityController::store", $queryLog);
            if ($result['status'] == ReturnMessage::OK) {
                return redirect('admin-backend/city/index')->with(['success_msg' => 'City store success']);
            } elseif ($result['status'] == ReturnMessage::INTERNAL_SERVER_ERROR) {
                return redirect('admin-backend/city/index')->with(['fail_msg' => 'City store fail!']);
            }
        } catch (\Exception $e) {
            Utility::saveErrorLog("CityController::store", $e->getMessage());
            abort(500);
        }
    }

    public function index()
    {
        try {
            $cities = $this->cityRepository->getCities();
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("CityController::index", $queryLog);
            return view('backend.city.index', compact([
                'cities'
            ]));
        } catch (\Exception $e) {
            Utility::saveErrorLog("CityController::index", $e->getMessage());
            abort(500);
        }
    }

    public function edit(int $id)
    {
        try {
            $city = $this->cityRepository->getCityById((int) $id);
            if ($city == null) {
                abort(404);
            }
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("CityController::edit", $queryLog);
            return view('backend.city.form', compact([
                'city'
            ]));

        } catch (\Exception $e) {
            if ($e->getCode() == 0) {
                Utility::saveErrorLog("CityController::edit", "Invalid City Id");
                abort(404);
            }
            Utility::saveErrorLog("CityController::edit", $e->getMessage());
            abort(500);
        }
    }

    public function update(CityUpdateRequest $request)
    {
        try {
            $result = $this->cityRepository->update((array) $request->all());
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("CityController::update", $queryLog);
            if ($result['status'] == ReturnMessage::OK) {
                return redirect('admin-backend/city/index')->with(['success_msg' => 'City update success']);
            } elseif ($result['status'] == ReturnMessage::INTERNAL_SERVER_ERROR) {
                return redirect('admin-backend/city/index')->with(['fail_msg' => 'City update fail!']);
            }
        } catch (\Exception $e) {
            Utility::saveErrorLog("CityController::update", $e->getMessage());
            abort(500);
        }
    }
}
