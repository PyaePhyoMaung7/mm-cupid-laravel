<?php

namespace App\Repositories\Dashboard;

interface DashboardRepositoryInterface
{
    public function getTotalRegCount();

    public function getTodayRegCount();

    public function getTotalActiveCount();

    public function getTodayDateRequestCount();

}
