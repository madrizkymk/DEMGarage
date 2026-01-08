<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\BookedController;
use App\Http\Controllers\User\BookingController;
use App\Http\Controllers\Admin\AdminIncomingController;
use App\Http\Controllers\Admin\UpdateServiceController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\User\HistoryController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SettingController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();

        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'user':
                return redirect()->route('user.dashboard');
            default:
                // fallback kalau ada role lain
                return view('dashboard');
        }
    })->name('dashboard');
});

Route::middleware(['auth', 'admin', 'throttle:60,1'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard admin -> resources/views/admin/dashboard.blade.php
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/incoming', [AdminIncomingController::class, 'index'])
            ->name('incoming.index');

        Route::patch('/incoming/{id}/update-status', [AdminIncomingController::class, 'updateStatus'])
            ->name('incoming.updateStatus');

        Route::get('/update-service', [UpdateServiceController::class, 'index'])
            ->name('update-service.index');

        Route::patch('/update-service/{id}', [UpdateServiceController::class, 'update'])
            ->name('update-service.update');

        Route::get('/users', [AdminUserController::class, 'index'])
            ->name('users.index');

        Route::get('/users/{user}', [AdminUserController::class, 'show'])
            ->name('users.show');

        // Di sini tambahkan route admin lain (contoh):
        // Route::resource('users', AdminUserController::class);
        // Route::resource('services', ServiceController::class);
    });

/*
|--------------------------------------------------------------------------
| USER ROUTES
|--------------------------------------------------------------------------
|
| Hanya bisa diakses user dengan role = 'user'
| Middleware 'user' cek $user->role === 'user'
|
*/

Route::middleware(['auth', 'user', 'throttle:60,1'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {

        // Dashboard user -> resources/views/user/dashboard.blade.php
        Route::get('/dashboard', [UserDashboardController::class, 'index'])
            ->name('dashboard');

        // Booking routes khusus user
        Route::resource('bookings', BookingController::class);
        Route::get('/booked', [BookedController::class, 'index'])
            ->name('booked.index');

        Route::delete('/booked/{booking}', [BookedController::class, 'destroy'])
            ->name('booked.destroy');

        Route::get('/history', [HistoryController::class, 'index'])
        ->name('history.index');

        Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile.index');

        Route::get('/settings', [SettingController::class, 'edit'])
            ->name('settings.edit');

        Route::patch('/settings', [SettingController::class, 'update'])
            ->name('settings.update');
    });

/*
|--------------------------------------------------------------------------
| PROFILE & AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [\App\Http\Controllers\ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// Auth Routes (Guest only)
Route::middleware('guest')->group(function () {
    // LOGIN + REGISTER menggunakan 1 halaman
    Route::get('login', function () {
        return view('auth.auth'); // halaman gabungan login+register
    })->name('login')->withoutMiddleware([\Illuminate\Routing\Middleware\ThrottleRequests::class]);

    // Register GET juga diarahkan ke halaman yang sama
    Route::get('register', function () {
        return redirect()->route('login'); // Redirect to login page
    })->name('register')->withoutMiddleware([\Illuminate\Routing\Middleware\ThrottleRequests::class]);

    // Proses Login
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->withoutMiddleware([\Illuminate\Routing\Middleware\ThrottleRequests::class]);

    // Proses Register (TETAP diperlukan)
    Route::post('register', [RegisteredUserController::class, 'store'])->withoutMiddleware([\Illuminate\Routing\Middleware\ThrottleRequests::class]);

    // Forgot Password
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    // Reset Password
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {

    // Email Verification
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    // Confirm password
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    // Update Password
    Route::put('password', [PasswordController::class, 'update'])
        ->name('password.update');

    // Logout
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
