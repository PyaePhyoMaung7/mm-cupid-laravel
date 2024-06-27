<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\City\CityRepository;
use App\Repositories\User\UserRepository;
use App\Repositories\Hobby\HobbyRepository;
use App\Repositories\Member\MemberRepository;

use App\Repositories\Setting\SettingRepository;
use App\Repositories\City\CityRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Hobby\HobbyRepositoryInterface;
use App\Repositories\Member\MemberRepositoryInterface;
use App\Repositories\Setting\SettingRepositoryInterface;

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
