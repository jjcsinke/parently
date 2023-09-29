<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\Controller::class, 'app'])->name('homepage');


Route::middleware('verified')->group(function() {
    Route::get('/portal/{path?}', [App\Http\Controllers\Controller::class, 'app'])
        ->where('path','.*')
        ->name('portal');
});
