<?php

namespace App\Http\Controllers\Member;

use App\Utility;
use App\Constant;
use App\Models\Member;
use App\ReturnMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\HobbyResource;
use App\Http\Resources\MemberResource;
use App\Http\Requests\EmailCheckRequest;
use App\Http\Requests\MemberLoginRequest;
use App\Http\Requests\EmailConfirmRequest;
use App\Http\Requests\MemberRegisterRequest;
use App\Http\Controllers\Member\MemberController;
use App\Repositories\City\CityRepositoryInterface;
use App\Repositories\Hobby\HobbyRepositoryInterface;
use App\Repositories\Member\MemberRepositoryInterface;
use App\Repositories\Setting\SettingRepositoryInterface;

class MemberController extends Controller
{
    private $cityRepository;
    private $memberRepository;
    private $settingRepository;

    public function __construct(
        CityRepositoryInterface $cityRepository,
        HobbyRepositoryInterface $hobbyRepository,
        MemberRepositoryInterface $memberRepository,
        SettingRepositoryInterface $settingRepository
    ) {
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
    public function index()
    {
        try {
            $setting = $this->settingRepository->getSetting();
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("MemberController::register", $queryLog);
            return view('frontend/index',  compact(['setting']));
        } catch (\Exception $e) {
            Utility::saveErrorLog("MemberController::index", $e->getMessage());
            abort(500);
        }
    }
    public function register()
    {
        try {
            $setting = $this->settingRepository->getSetting();
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("MemberController::register", $queryLog);
            return view('frontend.register', compact(['setting']));
        } catch (\Exception $e) {
            Utility::saveErrorLog("MemberController::register", $e->getMessage());
            abort(500);
        }
    }

    public function login()
    {
        try {
            $setting    = $this->settingRepository->getSetting();
            $queryLog   = DB::getQueryLog();
            Utility::saveDebugLog("MemberController::login", $queryLog);
            return view('frontend.login', compact(['setting']));
        } catch (\Exception $e) {
            Utility::saveErrorLog("MemberController::login", $e->getMessage());
            abort(500);
        }
    }

    public function logout()
    {
        try {
            Auth::guard('member')->logout();
            return redirect('login');
        } catch (\Exception $e) {
            Utility::saveErrorLog("MemberController::logout", $e->getMessage());
            abort(500);
        }
    }

    public function postMemberLogin(MemberLoginRequest $request)
    {
        try {
            $email      = $request->get('email');
            $password   = $request->get('password');

            $member     = $this->memberRepository->getMemberByEmail((string) $email);

            if ($member == null) {
                return redirect()
                ->back()
                ->with(
                    ['error_msg' => 'Email not found!']
                )->withInput();

            } elseif (!Hash::check($password, $member->password)) {

                return redirect()
                ->back()
                ->with(['error_msg' => 'Incorrect password!'])
                ->withInput();

            } elseif ($member->status == Constant::MEMBER_BANNED) {

                return redirect()
                ->back()
                ->with(['error_msg' => 'You have been banned from our wesite!'])
                ->withInput();

            } elseif ($member->deleted_at != null) {

                return redirect()
                ->back()
                ->with(['error_msg' => 'Your account has been deleted!'])
                ->withInput();

            } else {

                $credentials = Auth::guard('member')->attempt([
                            'email' => $email,
                            'password' => $password,
                            ]);

                if (!$credentials) {

                    return redirect()
                    ->back()
                    ->with(['error_msg' => 'Unexpected error occurred. Please contact admin!'])
                    ->withInput();

                } else {
                    $this->settingRepository->setSiteSetting();

                    $queryLog       = DB::getQueryLog();
                    Utility::saveDebugLog("AuthController::postMemberLogin", $queryLog);

                    return redirect('index');

                }
            }
        } catch (\Exception $e) {
            Utility::saveErrorLog("AuthController::postMemberLogin", $e->getMessage());
            abort(500);
        }
    }

    public function apiGetCities()
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

    public function apiGetHobbies()
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

    public function apiCheckEmail(EmailCheckRequest $request)
    {
        try {
            $email_exist = $this->memberRepository->emailAlreadyExists((array) $request->all());
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("MemberController::apiCheckEmail", $queryLog);
            return response()->json(['email_exist' => $email_exist]);
        } catch (\Exception $e) {
            Utility::saveErrorLog("MemberController::apiCheckEmail", $e->getMessage());
            abort(500);
        }
    }

    public function postRegister(MemberRegisterRequest $request)
    {
        try {
            $result = $this->memberRepository->register((array) $request->all());
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("MemberController::postRegister", $queryLog);
            if ($result['status'] == ReturnMessage::OK) {
                $data = $result['data'];
                $this->memberRepository->sendEmailConfirmMail($data);
                return new MemberResource($data);
            } else {
                return response()->json([
                    'success' => 'fail'
                ], ReturnMessage::INTERNAL_SERVER_ERROR);
            }
        } catch (\Exception $e) {
            Utility::saveErrorLog("MemberController::postRegister", $e->getMessage());
            abort(500);
        }
    }

    public function confirmEmail(EmailConfirmRequest $request)
    {
        try {
            $result = $this->memberRepository->confirmEmail((array) $request->all());
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("MemberController::confirmEmail", $queryLog);
            if ($result['status'] == ReturnMessage::OK) {
                return redirect('login')->with(['success_msg' => 'Email confirmed successfully']);
            } elseif ($result['status'] == ReturnMessage::INTERNAL_SERVER_ERROR) {
                return redirect('login')->with(['fail_msg' => 'Email confirmed failed!']);
            }
        } catch (\Exception $e) {
            Utility::saveErrorLog("MemberController::confirmEmail", $e->getMessage());
            abort(500);
        }
    }

    public function syncMember(Request $request)
    {
        $response       = [];
        $pageNo         = $request->page;
        $record_per_page= 9;
        $offset         = ($pageNo - 1) * $record_per_page;
        $total_show_data= $pageNo * $record_per_page;
        $response_data  = Member::skip($offset)->take($record_per_page)->get();
        $total_count    = Member::count();
        if($total_count <= $total_show_data){
            $response['show_more'] = false;
        }else{
            $response['show_more'] = true;
        }
        $response['status'] = '200';
        $response['data']   = $response_data;
        return response()->json(['data' => $response]);
    }
}
