<?php

namespace App\Http\Controllers\Auth;

use App\Utility;
use App\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AdminLoginRequest;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Setting\SettingRepositoryInterface;

class AuthController extends Controller
{
    private $userRepository;
    private $settingRepository;
    public function __construct(UserRepositoryInterface $userRepository, SettingRepositoryInterface $settingRepository)
    {
        $this->userRepository       = $userRepository;
        $this->settingRepository    = $settingRepository;
        DB::connection()->enableQueryLog();
    }

    public function adminLogout()
    {
        try {
            Auth::guard('admin')->logout();
            Session::flush();
            return redirect('admin-backend/login');
        } catch (\Exception $e) {
            Utility::saveErrorLog("AuthController::adminLogout", $e->getMessage());
            abort(500);
        }
    }

    public function adminLoginForm()
    {
        try {
            if (Auth::guard('admin')->user() != null) {
                return redirect('admin-backend/index');
            } else {
                return view('backend.login');
            }
        } catch (\Exception $e) {
            Utility::saveErrorLog("AuthController::adminLoginForm", $e->getMessage());
            abort(500);
        }
    }

    public function postAdminLogin(AdminLoginRequest $request)
    {
        try {
            $username = $request->get('username');
            $password = $request->get('password');

            $userInfo = $this->userRepository->getUserInfoByUsername((string) $username);

            if ($userInfo == null) {
                return redirect()
                ->bac()
                ->withErrors(
                    ['username' => 'Username not found!']
                )->withInput();

            } elseif (!Hash::check($password, $userInfo->password)) {

                return redirect()
                ->back()
                ->withErrors(['password' => 'Incorrect password!'])
                ->withInput();

            } elseif ($userInfo->status != Constant::ADMIN_ENABLE_STATUS) {

                return redirect()
                ->back()
                ->withErrors(['status' => 'You have been banned by admin!'])
                ->withInput();

            } elseif ($userInfo->deleted_at != null) {

                return redirect()
                ->back()
                ->withErrors(['deleted_at' => 'Your account has been deleted by admin!'])
                ->withInput();

            } else {

                $credentials = Auth::guard('admin')->attempt([
                            'username' => $username,
                            'password' => $password,
                            ]);

                if (!$credentials) {

                    return redirect()
                    ->back()
                    ->withErrors(['unexpected' => 'Unexpected error occurred. Please contact admin!'])
                    ->withInput();

                } else {
                    $role = Auth::guard('admin')->user()->role;
                    $permissions = $this->userRepository->getPermissionRoutesByRole((int) $role);
                    Session::put(['permission' => $permissions]);

                    $this->settingRepository->setSiteSetting();

                    $queryLog = DB::getQueryLog();
                    Utility::saveDebugLog("AuthController::postAdminLogin", $queryLog);

                    return redirect('admin-backend/index');

                }
            }
        } catch (\Exception $e) {
            Utility::saveErrorLog("AuthController::postAdminLogin", $e->getMessage());
            abort(500);
        }
    }
}
