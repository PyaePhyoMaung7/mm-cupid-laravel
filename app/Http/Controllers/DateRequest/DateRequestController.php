<?php

namespace App\Http\Controllers\DateRequest;

use App\Utility;
use App\ReturnMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\DateRequest\DateRequestRepositoryInterface;

class DateRequestController extends Controller
{
    private $dateRequestRepository;
    public function __construct(DateRequestRepositoryInterface $dateRequestRepository)
    {
        $this->dateRequestRepository = $dateRequestRepository;
        DB::connection()->enableQueryLog();
    }

    public function index()
    {
        try {
            $date_requests  = $this->dateRequestRepository->getDateRequests();
            $queryLog       = DB::getQueryLog();
            Utility::saveDebugLog("DateRequestController::index", $queryLog);
            return view('backend.date_request.index', compact([
                'date_requests'
            ]));
        } catch (\Exception $e) {
            Utility::saveErrorLog("DateRequestController::index", $e->getMessage());
            abort(500);
        }
    }

    public function view(int $id)
    {
        try {
            $date_request   = $this->dateRequestRepository->getDateRequestById((int) $id);
            $queryLog       = DB::getQueryLog();
            Utility::saveDebugLog("DateRequestController::view", $queryLog);
            return view('backend.date_request.details', compact([
                'date_request'
            ]));
        } catch (\Exception $e) {
            Utility::saveErrorLog("DateRequestController::view", $e->getMessage());
            abort(500);
        }
    }

    public function markAsContacted(int $id)
    {
        try {
            $result   = $this->dateRequestRepository->markAsContacted((int) $id);
            $queryLog       = DB::getQueryLog();
            Utility::saveDebugLog("DateRequestController::markAsContacted", $queryLog);
            if ($result['status'] == ReturnMessage::OK) {
                return redirect('admin-backend/date-request/index')->with(['success_msg' => 'Date request arranged successfully']);
            } elseif ($result['status'] == ReturnMessage::INTERNAL_SERVER_ERROR) {
                return redirect('admin-backend/date-request/index')->with(['fail_msg' => 'Date request arrangement successfully!']);
            }
        } catch (\Exception $e) {
            Utility::saveErrorLog("DateRequestController::markAsContacted", $e->getMessage());
            abort(500);
        }
    }
}
