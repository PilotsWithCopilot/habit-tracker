<?php

declare(strict_types=1);

use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function (): void {
    Route::get('login', [Auth\AuthenticatedSessionController::class, 'login'])
        ->name('login');

    Route::prefix('auth')->name('auth.')->group(function (): void {
        Route::prefix('telegram')->name('telegram.')->group(function (): void {
            Route::get('callback', [Auth\TelegramController::class, 'callback'])
                ->name('callback');
        });
    });
});

Route::middleware('auth')->group(function (): void {
    Route::get('verify-email', Auth\EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', Auth\VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [Auth\EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [Auth\ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [Auth\ConfirmablePasswordController::class, 'store'])
        ->middleware('throttle:6,1');

    Route::post('logout', [Auth\TelegramController::class, 'destroy'])
        ->name('logout');
});
