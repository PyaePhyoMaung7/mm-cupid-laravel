<?php

namespace App\Http\Controllers\Hobby;

use App\Utility;
use App\ReturnMessage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\HobbyStoreRequest;
use App\Http\Requests\HobbyUpdateRequest;
use App\Repositories\Hobby\HobbyRepositoryInterface;

class HobbyController extends Controller
{
    private $hobbyRepository;
    public function __construct(HobbyRepositoryInterface $hobbyRepository)
    {
        $this->hobbyRepository = $hobbyRepository;
        DB::connection()->enableQueryLog();
    }

    public function create()
    {
        try {
            return view('backend.hobby.form');
        } catch (\Exception $e) {
            Utility::saveErrorLog("HobbyController::create", $e->getMessage());
            abort(500);
        }
    }

    public function store(HobbyStoreRequest $request)
    {
        try {
            $result = $this->hobbyRepository->store((array) $request->all());
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("HobbyController::store", $queryLog);
            if ($result['status'] == ReturnMessage::OK) {
                return redirect('admin-backend/hobby/index')->with(['success_msg' => 'Hobby store success']);
            } elseif ($result['status'] == ReturnMessage::INTERNAL_SERVER_ERROR) {
                return redirect('admin-backend/hobby/index')->with(['fail_msg' => 'Hobby store fail!']);
            }
        } catch (\Exception $e) {
            Utility::saveErrorLog("HobbyController::store", $e->getMessage());
            abort(500);
        }
    }

    public function index()
    {
        try {
            $hobbies = $this->hobbyRepository->getHobbies();
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("HobbyController::index", $queryLog);
            return view('backend.hobby.index', compact([
                'hobbies'
            ]));
        } catch (\Exception $e) {
            Utility::saveErrorLog("HobbyController::index", $e->getMessage());
            abort(500);
        }
    }

    public function edit(int $id)
    {
        try {
            $hobby = $this->hobbyRepository->getHobbyById((int) $id);
            if ($hobby == null) {
                abort(404);
            }
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("HobbyController::edit", $queryLog);
            return view('backend.hobby.form', compact([
                'hobby'
            ]));

        } catch (\Exception $e) {
            if ($e->getCode() == 0) {
                Utility::saveErrorLog("HobbyController::edit", "Invalid Hobby Id");
                abort(404);
            }
            Utility::saveErrorLog("HobbyController::edit", $e->getMessage());
            abort(500);
        }
    }

    public function update(HobbyUpdateRequest $request)
    {
        try {
            $result = $this->hobbyRepository->update((array) $request->all());
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("HobbyController::update", $queryLog);
            if ($result['status'] == ReturnMessage::OK) {
                return redirect('admin-backend/hobby/index')->with(['success_msg' => 'Hobby update success']);
            } elseif ($result['status'] == ReturnMessage::INTERNAL_SERVER_ERROR) {
                return redirect('admin-backend/hobby/index')->with(['fail_msg' => 'Hobby update fail!']);
            }
        } catch (\Exception $e) {
            Utility::saveErrorLog("HobbyController::update", $e->getMessage());
            abort(500);
        }
    }

    public function delete(int $id)
    {
        try {
            $result = $this->hobbyRepository->delete((int) $id);
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("HobbyController::delete", $queryLog);
            if ($result['status'] == ReturnMessage::OK) {
                return redirect('admin-backend/hobby/index')->with(['success_msg' => 'Hobby delete success']);
            } elseif ($result['status'] == ReturnMessage::INTERNAL_SERVER_ERROR) {
                return redirect('admin-backend/hobby/index')->with(['fail_msg' => 'Hobby delete fail!']);
            }
        } catch (\Exception $e) {
            Utility::saveErrorLog("HobbyController::delete", $e->getMessage());
            abort(500);
        }
    }
}
