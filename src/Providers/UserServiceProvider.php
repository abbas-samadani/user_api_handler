<?php
namespace Plentific\UserApiHandler\Providers;
use Illuminate\Support\ServiceProvider;
use Plentific\UserApiHandler\Services\ReqresService;
use Plentific\UserApiHandler\Services\UserService;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {

        $this->app->singleton(UserService::class, function ($app) {
            return new UserService($app->make(ReqresService::class));
        });
    }
}
