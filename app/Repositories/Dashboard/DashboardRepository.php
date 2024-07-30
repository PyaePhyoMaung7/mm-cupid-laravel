<?php

namespace App\Repositories\Dashboard;

use App\Utility;
use App\Constant;
use Carbon\Carbon;
use App\Models\City;
use App\Models\Member;
use App\ReturnMessage;
use App\Models\DateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Dashboard\DashboardRepositoryInterface;

class DashboardRepository implements DashboardRepositoryInterface
{
    public function getTotalRegCount()
    {
        $result = Member::count();
        return $result;
    }

    public function getTodayRegCount()
    {
        $today      = Carbon::today();
        $result     = Member::whereDate('created_at', $today)
                            ->count();
        return $result;
    }

    public function getTotalActiveCount()
    {
        $last_30_day    = Carbon::now()->subDays(30);
        $result         = Member::whereNull('deleted_at')
                                ->where('last_login', '>=', $last_30_day)
                                ->whereNotIn('status', [Constant::MEMBER_UNVERIFIED, Constant::MEMBER_BANNED])
                                ->count();
        return $result;
    }

    public function getTodayDateRequestCount()
    {
        $today      = Carbon::today();
        $result     = DateRequest::whereDate('created_at', $today)
                                ->count();
        return $result;
    }

}
