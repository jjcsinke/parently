<?php

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

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/menu', [\App\Http\Controllers\Controller::class, 'menu'])->name('menu');
    Route::apiResource('schools', SchoolController::class);
    Route::apiResource('parents', ParentController::class);

});
