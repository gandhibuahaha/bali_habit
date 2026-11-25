<?php

namespace App\Providers;

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

            $initials = collect(preg_split('/\s+/', trim((string) $admin->name)))
                ->filter()
                ->take(2)
                ->map(fn (string $word) => mb_strtoupper(mb_substr($word, 0, 1)))
                ->implode('');

            $view->with([
                'admin' => $admin,
                'adminInitials' => $initials,
                'adminPhoto' => $admin->profile_picture ? asset('storage/'.$admin->profile_picture) : null,
            ]);
        });
    }
}
