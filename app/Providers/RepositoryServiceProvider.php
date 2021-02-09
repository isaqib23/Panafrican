<?php

namespace App\Providers;

use App\Repositories\AccountsRepository;
use App\Repositories\AccountsRepositoryEloquent;
use App\Repositories\ActivityRepository;
use App\Repositories\ActivityRepositoryEloquent;
use App\Repositories\AuthRepository;
use App\Repositories\AuthRepositoryEloquent;
use App\Repositories\BranchRepository;
use App\Repositories\BranchRepositoryEloquent;
use App\Repositories\ContactRepository;
use App\Repositories\ContactRepositoryEloquent;
use App\Repositories\LeadsRepository;
use App\Repositories\LeadsRepositoryEloquent;
use App\Repositories\LocationsRepository;
use App\Repositories\LocationsRepositoryEloquent;
use App\Repositories\NoteRepository;
use App\Repositories\NoteRepositoryEloquent;
use App\Repositories\OpportunityRepository;
use App\Repositories\OpportunityRepositoryEloquent;
use App\Repositories\UsersRepository;
use App\Repositories\UsersRepositoryEloquent;
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
        $this->app->bind(LocationsRepository::class, LocationsRepositoryEloquent::class);
        $this->app->bind(AccountsRepository::class, AccountsRepositoryEloquent::class);
        $this->app->bind(BranchRepository::class, BranchRepositoryEloquent::class);
        $this->app->bind(UsersRepository::class, UsersRepositoryEloquent::class);
        $this->app->bind(LeadsRepository::class, LeadsRepositoryEloquent::class);
        $this->app->bind(ActivityRepository::class, ActivityRepositoryEloquent::class);
        $this->app->bind(ContactRepository::class, ContactRepositoryEloquent::class);
        $this->app->bind(OpportunityRepository::class, OpportunityRepositoryEloquent::class);
        $this->app->bind(NoteRepository::class, NoteRepositoryEloquent::class);
        //:end-bindings:
    }
}
