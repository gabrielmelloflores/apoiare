<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();

        Gate::define('admin', function (User $user) {
            return $user->role == 1; //Admin
        });

        Gate::define('author', function (User $user) {
            return $user->role == 2; //Author
        });

        Gate::define('adminOrAuthor', function (User $user) {
            if($user->role == 1) {
                return $user->role == 1;
            }else if($user->role == 2){
                return $user->role == 2;
            }
        });
    }
}
