<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('verified')->group(function() {
    Route::get('/portal/{path?}', [Controller::class, 'app'])
        ->where('path','.*')
        ->name('portal');
});

Route::get('/{path?}', [Controller::class, 'app'])->name('homepage')
    ->where('path', '.*')
    ->name('homepage');

Route::get('/login', [Controller::class, 'app'])->name('login');
Route::get('/reset-password', [Controller::class, 'app'])->name('password.reset');
Route::get('/verify-email', [Controller::class, 'app'])->name('verification.notice');
