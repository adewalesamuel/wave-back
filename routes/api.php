<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AcceptsJson;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\DisaggregationController;
use App\Http\Controllers\IndicatorDisaggregationController;

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
    Route::any('forgot-password', [AuthController::class, 'forgotPassword'])->name('password.forgot');
    Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('password.reset');

    Route::middleware('jwt.verify')->group(function() {
               
        Route::get('roles', [RoleController::class, 'index']);
        Route::post('roles', [RoleController::class, 'store']);
        Route::put('roles/{role}', [RoleController::class, 'update']);
        Route::delete('roles/{role}', [RoleController::class, 'destroy']);

        Route::get('permissions', [PermissionController::class, 'index']);
        Route::post('permissions', [PermissionController::class, 'store']);
        Route::put('permissions/{permission}', [PermissionController::class, 'update']);
        Route::delete('permissions/{permission}', [PermissionController::class, 'destroy']);

        Route::get('users', [UserController::class, 'index']);
        Route::post('users', [UserController::class, 'store']);
        Route::put('users/{user}', [UserController::class, 'update']);
        Route::delete('users/{user}', [UserController::class, 'destroy']);

        Route::get('comments', [CommentController::class, 'index']);
        Route::post('comments', [CommentController::class, 'store']);
        Route::put('comments/{comment}', [CommentController::class, 'update']);
        Route::delete('comments/{comment}', [CommentController::class, 'destroy']);
       
        
        Route::get('notifications', [NotificationController::class, 'index']);
        Route::get('notifications/{notification}/markAsRead', [NotificationController::class, 'update']);
        
        Route::get('projects', [ProjectController::class, 'index']);
        Route::post('projects', [ProjectController::class, 'store']);
        Route::put('projects/{project}', [ProjectController::class, 'update']);
        Route::delete('projects/{project}', [ProjectController::class, 'destroy']);
        Route::delete('projects/{project}/members', [ProjectController::class, 'index']);
       
        Route::get('activities', [ActivityController::class, 'index']);
        Route::post('activities', [ActivityController::class, 'store']);
        Route::put('activities/{activity}', [ActivityController::class, 'update']);
        Route::delete('activities/{activity}', [ActivityController::class, 'destroy']);
        
        Route::get('indicators', [IndicatorController::class, 'index']);
        Route::post('indicators', [IndicatorController::class, 'store']);
        Route::put('indicators/{indicator}', [IndicatorController::class, 'update']);
        Route::delete('indicators/{indicator}', [IndicatorController::class, 'destroy']); 
        Route::get('indicators/{indicator}/disaggregations', [IndicatorController::class, 'disaggregations']);
       
        Route::get('disaggregations', [DisaggregationController::class, 'index']);
        Route::post('disaggregations', [DisaggregationController::class, 'store']);
        Route::put('disaggregations/{disaggregation}', [DisaggregationController::class, 'update']);
        Route::delete('disaggregations/{disaggregation}', [DisaggregationController::class, 'destroy']); 
        
        Route::post('indicator_disaggregations', [IndicatorDisaggregationController::class, 'store']); 
        Route::delete('indicator_disaggregations/{indicator_disaggregation}', [IndicatorDisaggregationController::class, 'destroy']); 
        
        Route::post('test', function () {
            return response()->json(['status' => 'ok'], 200);
        });
    });

});
