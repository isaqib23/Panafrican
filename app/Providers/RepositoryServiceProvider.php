<?php

namespace App\Providers;

use App\Repositories\AuthRepository;
use App\Repositories\AuthRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(AuthRepository::class, AuthRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\LocationsRepository::class, \App\Repositories\LocationsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\AccountsRepository::class, \App\Repositories\AccountsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BranchRepository::class, \App\Repositories\BranchRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UsersRepository::class, \App\Repositories\UsersRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\LeadsRepository::class, \App\Repositories\LeadsRepositoryEloquent::class);
        //:end-bindings:
    }
}
