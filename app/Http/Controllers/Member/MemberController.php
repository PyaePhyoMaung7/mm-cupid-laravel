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
use App\Http\Resources\SyncMemberResource;
use App\Http\Requests\MemberRegisterRequest;
use App\Http\Controllers\Member\MemberController;
use App\Http\Requests\Front\ApiDateInviteRequest;
use App\Http\Requests\Front\PasswordResetRequest;
use App\Http\Requests\Front\ApiSyncMembersRequest;
use App\Repositories\City\CityRepositoryInterface;
use App\Http\Requests\Front\ApiMemberUpdateRequest;
use App\Repositories\Hobby\HobbyRepositoryInterface;
use App\Http\Requests\Front\PasswordResetCodeRequest;
use App\Http\Requests\Front\PasswordResetLinkRequest;
use App\Repositories\Member\MemberRepositoryInterface;
use App\Http\Requests\Front\ApiMemberViewUpdateRequest;
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

    public function adminIndex()
    {
        try {
            $members = $this->memberRepository->getMembers();
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("MemberController::index", $queryLog);
            return view('backend.member.index', compact([
                'members'
            ]));
        } catch (\Exception $e) {
            Utility::saveErrorLog("MemberController::index", $e->getMessage());
            abort(500);
        }
    }

    public function point($id)
    {
        try {
            $point = $this->memberRepository->getMemberPointById((int) $id);
            if ($point == null) {
                abort(404);
            }
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("MemberController::point", $queryLog);
            return view('backend.member.point_form', compact([
                'point'
            ]));

        } catch (\Exception $e) {
            if ($e->getCode() == 0) {
                Utility::saveErrorLog("MemberController::point", "Invalid Member Id");
                abort(404);
            }
            Utility::saveErrorLog("MemberController::point", $e->getMessage());
            abort(500);
        }
    }

    public function changeStatus()
    {
        dd('hey');
    }

    public function index()
    {
        try {
            $setting = $this->settingRepository->getSetting();
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("MemberController::register", $queryLog);
            return view('frontend/index', compact(['setting']));
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
            if (Auth::guard('member')->user() != null) {
                return redirect('index');
            }
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

    public function apiMemberViewUpdate(ApiMemberViewUpdateRequest $request)
    {
        try {
            $result = $this->memberRepository->apiMemberViewUpdate((int) $request->get('id'));
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("MemberController::apiMemberViewUpdate", $queryLog);
            if ($result['status'] == ReturnMessage::OK) {
                return response()->json([
                    'success' => 'true'
                ], ReturnMessage::OK);
            } else {
                return response()->json([
                    'success' => 'false'
                ], ReturnMessage::INTERNAL_SERVER_ERROR);
            }
        } catch (\Exception $e) {
            Utility::saveErrorLog("MemberController::apiMemberViewUpdate", $e->getMessage());
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

    public function forgotPassword()
    {
        try {
            $setting = $this->settingRepository->getSetting();
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("MemberController::forgotPassword", $queryLog);
            return view('frontend.forgot_password', compact(['setting']));
        } catch (\Exception $e) {
            Utility::saveErrorLog("MemberController::forgotPassword", $e->getMessage());
            abort(500);
        }
    }

    public function sendPasswordResetLink(PasswordResetLinkRequest $request)
    {
        try {
            $result = $this->memberRepository->sendPasswordResetLink((array) $request->all());
            if ($result['status'] == ReturnMessage::OK) {
                return redirect('login')->with(['success_msg' => 'Passowrd reset link successfully sent']);
            } elseif ($result['status'] == ReturnMessage::INTERNAL_SERVER_ERROR) {
                return redirect('login')->with(['fail_msg' => 'Passowrd reset link failed to send!']);
            }
        } catch (\Exception $e) {
            Utility::saveErrorLog("MemberController::sendPasswordResetLink", $e->getMessage());
            abort(500);
        }
    }

    public function passwordResetCodeCheck(PasswordResetCodeRequest $request)
    {
        try {
            $code       = $request->get('code');
            $member_id  = $this->memberRepository->getMemberIdByPasswordResetCode((string) $code);
            return redirect('password-reset')->with('member_id', $member_id);
        } catch (\Exception $e) {
            Utility::saveErrorLog("MemberController::passwordResetCodeCheck", $e->getMessage());
            abort(500);
        }
    }

    public function resetPassword()
    {
        try {
            $member_id  = session('member_id');
            $setting    = $this->settingRepository->getSetting();
            $queryLog   = DB::getQueryLog();
            Utility::saveDebugLog("MemberController::resetPassword", $queryLog);
            return view('frontend.reset_password', compact([
                'setting',
                'member_id'
            ]));
        } catch (\Exception $e) {
            Utility::saveErrorLog("MemberController::resetPassword", $e->getMessage());
            abort(500);
        }
    }

    public function postResetPassword(PasswordResetRequest $request)
    {
        try {
            $result     = $this->memberRepository->updatePassword((array) $request->all());
            $queryLog   = DB::getQueryLog();
            Utility::saveDebugLog("MemberController::postResetPassword", $queryLog);
            if ($result['status'] == ReturnMessage::OK) {
                return redirect('login')->with(['success_msg' => 'Password updated successfully \n Please log in']);
            } elseif ($result['status'] == ReturnMessage::INTERNAL_SERVER_ERROR) {
                return redirect('login')->with(['fail_msg' => 'Password update failed!']);
            }
        } catch (\Exception $e) {
            Utility::saveErrorLog("MemberController::postResetPassword", $e->getMessage());
            abort(500);
        }
    }

    public function apiSyncMembers(ApiSyncMembersRequest $request)
    {
        try {
            $result = $this->memberRepository->apiSyncMembers((array) $request->all());
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("MemberController::apiSyncMembers", $queryLog);
            if ($result['status'] == ReturnMessage::OK) {
                return SyncMemberResource::collection($result['members']);
            } elseif ($result['status'] == ReturnMessage::INTERNAL_SERVER_ERROR) {
                return redirect('login')->with(['fail_msg' => 'Email confirmed failed!']);
            }
        } catch (\Exception $e) {
            Utility::saveErrorLog("MemberController::apiSyncMembers", $e->getMessage());
            abort(500);
        }
    }

    public function apiSendDateRequest(ApiDateInviteRequest $request)
    {
        try {
            $result = $this->memberRepository->apiSendDateRequest((int) $request->get('id'));
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("MemberController::apiSendDateRequest", $queryLog);
            if ($result['status'] == ReturnMessage::OK) {
                return response()->json([
                    'success'       => 'true',
                    'success_code'  => 'Z0001',
                    'new_point'     => $result['new_point'],
                    'data'          => new SyncMemberResource($result['member_update']),
                ], ReturnMessage::OK);
            } else {
                return response()->json([
                    'success' => 'false'
                ], ReturnMessage::INTERNAL_SERVER_ERROR);
            }
        } catch (\Exception $e) {
            Utility::saveErrorLog("MemberController::apiSendDateRequest", $e->getMessage());
            abort(500);
        }
    }

    public function apiGetLoginInfo()
    {
        try {
            $member = $this->memberRepository->getMemberById(Auth::guard('member')->user()->id);
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("MemberController::apiGetLoginInfo", $queryLog);
            return new MemberResource($member);
        } catch (\Exception $e) {
            Utility::saveErrorLog("MemberController::apiGetLoginInfo", $e->getMessage());
            abort(500);
        }
    }

    public function getProfile()
    {
        try {
            $setting = $this->settingRepository->getSetting();
            $queryLog = DB::getQueryLog();
            return view('frontend/profile', compact(['setting']));
        } catch (\Exception $e) {
            Utility::saveErrorLog("MemberController::getProfile", $e->getMessage());
            abort(500);
        }
    }

    public function apiMemberUpdate(ApiMemberUpdateRequest $request)
    {
        try {
            $result = $this->memberRepository->memberUpdate((array) $request->all());
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("MemberController::apiMemberUpdate", $queryLog);
            if ($result['status'] == ReturnMessage::OK) {
                $data = $result['data'];
                return new MemberResource($data);
            } else {
                return response()->json([
                    'success' => 'fail'
                ], ReturnMessage::INTERNAL_SERVER_ERROR);
            }
        } catch (\Exception $e) {
            Utility::saveErrorLog("MemberController::apiMemberUpdate", $e->getMessage());
            abort(500);
        }
    }

}
