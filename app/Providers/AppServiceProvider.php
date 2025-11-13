<?php

namespace App\Providers;

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

        // Route::middleware('web')->group(function () {
        //     Route::get('/redirect-after-login', function () {
        //         $user = auth()->user();
        //         if ($user->role === 'admin') {
        //             return redirect()->route('admin.dashboard');
        //         } elseif ($user->role === 'user') {
        //             return redirect()->route('user.dashboard');
        //         }
        //         return redirect('/'); // Default fallback
        //     })->name('redirect.after.login');

        // });
    }
}
