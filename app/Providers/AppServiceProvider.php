<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('ketua_rt', function(User $user) {
            return $user->role == 'ketua_rt';
        });

        Gate::define('warga', function(User $user) {
            return $user->role == 'warga';
        });
    }
}
