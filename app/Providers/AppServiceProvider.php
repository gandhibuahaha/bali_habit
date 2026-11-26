<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\View;
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
        // Every admin page shows the logged-in admin in the top-right menu:
        // $admin (the user), $adminInitials (e.g. "TA") and $adminPhoto (URL or null).
        View::composer('admin.*', function ($view) {
            $admin = auth()->user();
            if (! $admin) {
                return;
            }

            $view->with([
                'admin' => $admin,
                'adminInitials' => User::initialsOf((string) $admin->name),
                'adminPhoto' => $admin->profile_picture ? asset('storage/'.$admin->profile_picture) : null,
            ]);
        });
    }
}
