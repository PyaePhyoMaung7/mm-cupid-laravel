<?php

namespace App\Http\Controllers\User;

use App\Utility;
use App\ReturnMessage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
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

    public function editPassword (int $id)
    {
        try {
            $user = $this->userRepository->getUserById((int) $id);
            if ($user == null) {
                abort(404);
            }
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

    public function update(UserStoreRequest $request)
    {
        dd($request->all());
    }
}
