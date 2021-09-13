<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', App::getLocale());

/* Website */
Route::prefix('{locale}')
    ->middleware(['locale'])
    ->group(function () {
        Route::get('/', [\App\Http\Controllers\AppController::class, 'index']);

        Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])
            ->middleware(['guest'])->name('login');
        Route::post('/login', [\App\Http\Controllers\LoginController::class, 'loginAttempt'])
            ->middleware(['guest']);
        Route::post('/logout', [\App\Http\Controllers\LoginController::class, 'logoutAttempt'])
            ->middleware(['auth']);

        Route::get('/forgot-password', [\App\Http\Controllers\PasswordController::class, 'forgotPassword'])
            ->middleware(['guest']);
        Route::post('/forgot-password', [\App\Http\Controllers\PasswordController::class, 'forgotPasswordAttempt'])
            ->middleware(['guest']);
        Route::get('/reset-password', [\App\Http\Controllers\PasswordController::class, 'resetPassword'])
            ->middleware(['guest']);
        Route::post('/reset-password', [\App\Http\Controllers\PasswordController::class, 'resetPasswordAttempt'])
            ->middleware(['guest']);
    });
