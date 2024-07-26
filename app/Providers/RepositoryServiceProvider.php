<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\City\CityRepository;
use App\Repositories\DateRequest\DateRequestRepository;
use App\Repositories\User\UserRepository;
use App\Repositories\Hobby\HobbyRepository;
use App\Repositories\Member\MemberRepository;
use App\Repositories\Setting\SettingRepository;
use App\Repositories\Transaction\TransactionRepository;

use App\Repositories\City\CityRepositoryInterface;
use App\Repositories\DateRequest\DateRequestRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Hobby\HobbyRepositoryInterface;
use App\Repositories\Member\MemberRepositoryInterface;
use App\Repositories\Setting\SettingRepositoryInterface;
use App\Repositories\Transaction\TransactionRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
        $this->app->bind(HobbyRepositoryInterface::class, HobbyRepository::class);
        $this->app->bind(MemberRepositoryInterface::class, MemberRepository::class);
        $this->app->bind(TransactionRepositoryInterface::class, TransactionRepository::class);
        $this->app->bind(DateRequestRepositoryInterface::class, DateRequestRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
