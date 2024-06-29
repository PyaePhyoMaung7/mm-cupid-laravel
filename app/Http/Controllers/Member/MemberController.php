<?php

namespace App\Http\Controllers\Member;

use App\Utility;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Member\MemberController;
use App\Http\Resources\CityResource;
use App\Http\Resources\HobbyResource;
use App\Repositories\City\CityRepositoryInterface;
use App\Repositories\Hobby\HobbyRepositoryInterface;
use App\Repositories\Member\MemberRepositoryInterface;
use App\Repositories\Setting\SettingRepositoryInterface;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    private $cityRepository;
    private $memberRepository;
    private $settingRepository;

    public function __construct(
        CityRepositoryInterface $cityRepository,
        HobbyRepositoryInterface $hobbyRepository,
        MemberRepositoryInterface $memberRepository,
        SettingRepositoryInterface $settingRepository)
    {
        $this->cityRepository       = $cityRepository;
        $this->hobbyRepository      = $hobbyRepository;
        $this->memberRepository     = $memberRepository;
        $this->settingRepository    = $settingRepository;
        DB::connection()->enableQueryLog();
    }

    // public function index()
    // {
    //     try {
    //         $members = $this->memberRepository->getMembers();
    //         $queryLog = DB::getQueryLog();
    //         Utility::saveDebugLog("MemberController::index", $queryLog);
    //         return view('backend.member.index', compact([
    //             'members'
    //         ]));
    //     } catch (\Exception $e) {
    //         Utility::saveErrorLog("MemberController::index", $e->getMessage());
    //         abort(500);
    //     }
    // }

    public function register ()
    {
        try {
            $setting = $this->settingRepository->getSetting();
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("MemberController::getRegister", $queryLog);
            return view('frontend.register', compact(['setting']));
        } catch (\Exception $e) {
            Utility::saveErrorLog("MemberController::getRegister", $e->getMessage());
            abort(500);
        }
    }

    public function apiGetCities ()
    {
        try {
            $cities = $this->cityRepository->apiGetCities();
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("MemberController::apiGetCities", $queryLog);
            return CityResource::collection($cities);
        } catch (\Exception $e) {
            Utility::saveErrorLog("MemberController::apiGetCities", $e->getMessage());
            abort(500);
        }
    }

    public function apiGetHobbies ()
    {
        try {
            $hobbies = $this->hobbyRepository->apiGetHobbies();
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("MemberController::apiGetHobbies", $queryLog);
            return HobbyResource::collection($hobbies);
        } catch (\Exception $e) {
            Utility::saveErrorLog("MemberController::apiGetHobbies", $e->getMessage());
            abort(500);
        }
    }

    public function apiCheckEmail (Request $request)
    {
        try {
            return response()->json($request->all());
            // $hobbies = $this->hobbyRepository->apiGetHobbies();
            // $queryLog = DB::getQueryLog();
            // Utility::saveDebugLog("MemberController::apiGetHobbies", $queryLog);
            // return HobbyResource::collection($hobbies);
        } catch (\Exception $e) {
            Utility::saveErrorLog("MemberController::apiGetHobbies", $e->getMessage());
            abort(500);
        }
    }

    public function photoRegister ()
    {
        try {
            dd('a');
            // $setting = $this->settingRepository->getSetting();
            // $queryLog = DB::getQueryLog();
            // Utility::saveDebugLog("MemberController::getRegister", $queryLog);
            return view('frontend.register', compact(['setting']));
        } catch (\Exception $e) {
            Utility::saveErrorLog("MemberController::photoRegister", $e->getMessage());
            abort(500);
        }
    }

    public function infoRegister ()
    {
        try {
            dd('a');
        } catch (\Exception $e) {
            Utility::saveErrorLog("MemberController::infoRegister", $e->getMessage());
            abort(500);
        }
    }
}
