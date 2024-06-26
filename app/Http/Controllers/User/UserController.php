<?php

namespace App\Http\Controllers\User;

use App\Utility;
use App\Constant;
use App\ReturnMessage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserInfoUpdateRequest;
use App\Http\Requests\UserPasswordUpdateRequest;
use App\Repositories\User\UserRepositoryInterface;

class UserController extends Controller
{
    private $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
        DB::connection()->enableQueryLog();
    }

    public function create()
    {
        try {
            return view('backend.user.form');
        } catch (\Exception $e) {
            Utility::saveErrorLog("UserController::create", $e->getMessage());
            abort(500);
        }
    }

    public function store(UserStoreRequest $request)
    {
        try {
            $result = $this->userRepository->store((array) $request->all());
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("UserController::store", $queryLog);
            if ($result['status'] == ReturnMessage::OK) {
                return redirect('admin-backend/user/index')->with(['success_msg' => 'User create success']);
            } elseif ($result['status'] == ReturnMessage::INTERNAL_SERVER_ERROR) {
                return redirect('admin-backend/user/index')->with(['fail_msg' => 'User create fail!']);
            }
        } catch (\Exception $e) {
            Utility::saveErrorLog("UserController::store", $e->getMessage());
            abort(500);
        }
    }

    public function index()
    {
        try {
            $users = $this->userRepository->getUsers();
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("UserController::index", $queryLog);
            return view('backend.user.index', compact([
                'users'
            ]));
        } catch (\Exception $e) {
            Utility::saveErrorLog("UserController::index", $e->getMessage());
            abort(500);
        }
    }

    public function editPassword(int $id)
    {
        try {
            $user = $this->userRepository->getUserById((int) $id);
            if ($user == null) {
                abort(404);
            }
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("UserController::editPassword", $queryLog);
            return view('backend.user.edit_password', compact('id'));
        } catch (\Exception $e) {
            if ($e->getCode() == 0) {
                Utility::saveErrorLog("UserController::editPassword", "Invalid User Id");
                abort(404);
            }
            Utility::saveErrorLog("UserController::editPassword", $e->getMessage());
            abort(500);
        }
    }

    public function updatePassword(UserPasswordUpdateRequest $request)
    {
        try {
            $result = $this->userRepository->updatePassword((array) $request->all());
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("UserController::updatePassword", $queryLog);
            if ($result['status'] == ReturnMessage::OK) {
                return redirect('admin-backend/user/index')->with(['success_msg' => 'User password update success']);
            } elseif ($result['status'] == ReturnMessage::INTERNAL_SERVER_ERROR) {
                return redirect('admin-backend/user/index')->with(['fail_msg' => 'User password update fail!']);
            }
        } catch (\Exception $e) {
            Utility::saveErrorLog("UserController::updatePassword", $e->getMessage());
            abort(500);
        }
    }

    public function editInfo(int $id)
    {
        try {
            $user = $this->userRepository->getUserById((int) $id);
            if ($user == null) {
                abort(404);
            }
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("UserController::editInfo", $queryLog);
            return view('backend.user.edit_info', compact('user'));
        } catch (\Exception $e) {
            if ($e->getCode() == 0) {
                Utility::saveErrorLog("UserController::editInfo", "Invalid User Id");
                abort(404);
            }
            Utility::saveErrorLog("UserController::editInfo", $e->getMessage());
            abort(500);
        }
    }

    public function updateInfo(UserInfoUpdateRequest $request)
    {
        try {
            $result = $this->userRepository->updateInfo((array) $request->all());
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("UserController::updateInfo", $queryLog);
            if ($result['status'] == ReturnMessage::OK) {
                return redirect('admin-backend/user/index')->with(['success_msg' => 'User info update success']);
            } elseif ($result['status'] == ReturnMessage::INTERNAL_SERVER_ERROR) {
                return redirect('admin-backend/user/index')->with(['fail_msg' => 'User info update fail!']);
            }
        } catch (\Exception $e) {
            Utility::saveErrorLog("UserController::updateInfo", $e->getMessage());
            abort(500);
        }
    }

    public function changeStatus(int $id, int $status)
    {
        try {
            $result = $this->userRepository->changeStatus((int) $id, (int) $status);
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("UserController::changeStatus", $queryLog);
            if ($result['status'] == ReturnMessage::OK) {
                if ($status == Constant::ADMIN_ENABLE_STATUS) {
                    return redirect('admin-backend/user/index')->with(['success_msg' => 'User account is enabled']);
                } else if ($status == Constant::ADMIN_DISABLE_STATUS) {
                    return redirect('admin-backend/user/index')->with(['fail_msg' => 'User account is disabled']);
                }
            } elseif ($result['status'] == ReturnMessage::INTERNAL_SERVER_ERROR) {
                return redirect('admin-backend/user/index')->with(['fail_msg' => 'User status change fail!']);
            }
        } catch (\Exception $e) {
            Utility::saveErrorLog("UserController::changeStatus", $e->getMessage());
            abort(500);
        }
    }

    public function delete(int $id)
    {
        try {
            $result = $this->userRepository->delete((int) $id);
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("UserController::delete", $queryLog);
            if ($result['status'] == ReturnMessage::OK) {
                return redirect('admin-backend/user/index')->with(['success_msg' => 'User delete success']);
            } elseif ($result['status'] == ReturnMessage::INTERNAL_SERVER_ERROR) {
                return redirect('admin-backend/user/index')->with(['fail_msg' => 'Uuser delete fail!']);
            }
        } catch (\Exception $e) {
            Utility::saveErrorLog("UserController::delete", $e->getMessage());
            abort(500);
        }
    }
}
