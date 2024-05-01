<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\SchoolController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/', function (Request $request) {
    return ['message' => __('Hi there!')];
});

Route::get('/page/{page}', [HomeController::class, 'getPageContent'])
    ->where('page', '.*')
    ->name('page.show');

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/account', [AccountController::class, 'account'])->name('account');
    Route::get('/menu', [Controller::class, 'menu'])->name('menu');
    Route::apiResource('schools', SchoolController::class);
    Route::apiResource('parents', ParentController::class);
    Route::apiResource('children', ChildController::class);
    Route::apiResource('cities', CityController::class);
    
});
