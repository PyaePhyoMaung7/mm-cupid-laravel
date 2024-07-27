<?php

namespace App\Http\Controllers\Dashboard;

use App\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\DashboardRepositoryInterface;

class DashboardController extends Controller
{
    private $dashboardRepository;
    public function __construct(DashboardRepositoryInterface $dashboardRepository)
    {
        $this->dashboardRepository  = $dashboardRepository;
        DB::connection()->enableQueryLog();
    }

    public function index()
    {
        try {
            $totalRegCount          = $this->dashboardRepository->getTotalRegCount();
            $todayRegCount          = $this->dashboardRepository->getTodayRegCount();
            $totalActiveCount       = $this->dashboardRepository->getTotalActiveCount();
            $todayDateRequestCount  = $this->dashboardRepository->getTodayDateRequestCount();
            $queryLog               = DB::getQueryLog();
            Utility::saveDebugLog("DashboardController::index", $queryLog);

            return view('backend.dashboard', compact([
                'totalRegCount',
                'todayRegCount',
                'totalActiveCount',
                'todayDateRequestCount'
            ]));
        } catch (\Exception $e) {
            Utility::saveErrorLog("DashboardController::index", $e->getMessage());
            abort(500);
        }
    }
}
