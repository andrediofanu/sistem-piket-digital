<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\ServiceProvider;

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
        View::composer('*', function ($view): void {
            $user = Auth::user();

            // Default values
            $role = null;
            $isAdminPiket = false;
            $isWaliKelas = false;

            // Check if user is logged in
            if ($user) {
                $role = $user->role_id;
                $isAdminPiket = $user->isAdminPiket == 1;
                $isWaliKelas = $user->isWaliKelas == 1;
            }

            // Share variables with all views
            $view->with([
                'isAdminPiket' => $isAdminPiket,
                'isWaliKelas' => $isWaliKelas,
                'role' => $role,
            ]);
        });
    }

}
