<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AcceptsJson;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::name('api.')->group(function() {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('forgot-password', [AuthController::class, 'forgotPassword'])->name('password.forgot');
    Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('password.reset');

    Route::middleware('jwt.verify')->group(function() {
        Route::post('test', function () {
            return response()->json(['status' => 'ok'], 200);
        });
    });

});
