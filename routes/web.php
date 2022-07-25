<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DashboardController;

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

Route::middleware(['auth'])->group(function() {
    Route::get('/', [DashboardController::class, 'redirectByRole'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'showProfile'])->name('profile');
    Route::put('/profile', [DashboardController::class, 'updateProfile']);

    Route::middleware('Admin')->group(function() {
        Route::resource('/users', UserController::class);
        Route::resource('/groups', GroupController::class);
        Route::resource('/members', MemberController::class);
    });
});


require __DIR__.'/auth.php';
