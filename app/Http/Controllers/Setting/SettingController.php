<?php

namespace App\Http\Controllers\Setting;

use App\Utility;
use App\ReturnMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingStoreRequest;
use App\Repositories\Setting\SettingRepositoryInterface;

class SettingController extends Controller
{
    private $settingRepository;
    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
        DB::connection()->enableQueryLog();
    }

    public function index()
    {
        try {
            $setting = $this->settingRepository->getSetting();
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("SettingController::index", $queryLog);
            return view('backend.setting.index', compact(['setting']));
        } catch (\Exception $e) {
            Utility::saveErrorLog("SettingController::index", $e->getMessage());
            abort(500);
        }
    }

    public function store(SettingStoreRequest $request)
    {
        try {
            $result = $this->settingRepository->store((array) $request->all());
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("SettingController::store", $queryLog);

            if ($result['status'] == ReturnMessage::OK) {
                return redirect('admin-backend/setting/index')->with(['success_msg' => 'Setting store success']);
            } elseif ($result['status'] == ReturnMessage::INTERNAL_SERVER_ERROR) {
                return redirect('admin-backend/setting/index')->with(['fail_msg' => 'Setting store fail!']);
            }
        } catch (\Exception $e) {
            Utility::saveErrorLog("SettingController::store", $e->getMessage());
            abort(500);
        }
    }

    public function edit()
    {
        try {
            $setting = $this->settingRepository->getSetting();
            if ($setting == null) {
                abort(404);
            }
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("SettingController::edit", $queryLog);
            return view('backend.setting.form', compact([
                'setting'
            ]));

        } catch (\Exception $e) {
            if ($e->getCode() == 0) {
                Utility::saveErrorLog("SettingController::edit", "Invalid Setting Id");
                abort(404);
            }
            Utility::saveErrorLog("SettingController::edit", $e->getMessage());
            abort(500);
        }
    }

    public function update(SettingStoreRequest $request)
    {
        try {
            $result = $this->settingRepository->update((array) $request->all());
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("SettingController::update", $queryLog);

            if ($result['status'] == ReturnMessage::OK) {
                return redirect('admin-backend/setting/index')->with(['success_msg' => 'Setting update success']);
            } elseif ($result['status'] == ReturnMessage::INTERNAL_SERVER_ERROR) {
                return redirect('admin-backend/setting/index')->with(['fail_msg' => 'Setting update fail!']);
            }
        } catch (\Exception $e) {
            Utility::saveErrorLog("SettingController::update", $e->getMessage());
            abort(500);
        }
    }
}
