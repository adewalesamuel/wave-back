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
use App\Http\Controllers\ProjectMemberController;
use App\Http\Controllers\CollectedDataController;
use App\Http\Controllers\ActivityIndicatorController;
use App\Http\Controllers\GraphController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\OutcomeController;

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
               
        Route::get('roles', [RoleController::class, 'index'])->middleware('can:viewAny,App\Models\Role');
        Route::post('roles', [RoleController::class, 'store'])->middleware('can:create,App\Models\Role');
        Route::put('roles/{role}', [RoleController::class, 'update'])->middleware('can:update,role');
        Route::delete('roles/{role}', [RoleController::class, 'destroy'])->middleware('can:delete,role');

        Route::get('permissions', [PermissionController::class, 'index']);
        Route::post('permissions', [PermissionController::class, 'store'])->middleware('can:create,App\Models\Permission');
        Route::put('permissions/{permission}', [PermissionController::class, 'update'])->middleware('can:update,permission');
        Route::delete('permissions/{permission}', [PermissionController::class, 'destroy'])->middleware('can:delete,permission');

        Route::get('users', [UserController::class, 'index'])->middleware('can:viewAny,App\Models\User');
        Route::post('users', [UserController::class, 'store'])->middleware('can:create,App\Models\User');
        Route::put('users/{user}', [UserController::class, 'update'])->middleware('can:update,user');
        Route::delete('users/{user}', [UserController::class, 'destroy'])->middleware('can:delete,user');

        Route::get('comments', [CommentController::class, 'index'])->middleware('can:viewAny,App\Models\Comment');
        Route::post('comments', [CommentController::class, 'store'])->middleware('can:create,App\Models\Comment');
        Route::put('comments/{comment}', [CommentController::class, 'update'])->middleware('can:update,comment');
        Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->middleware('can:delete,comment');
       
        Route::get('notifications', [NotificationController::class, 'index']);
        Route::get('notifications/{notification}/markAsRead', [NotificationController::class, 'update']);
        
        Route::get('projects', [ProjectController::class, 'index'])->middleware('can:viewAny,App\Models\Project');
        Route::get('projects/{project}', [ProjectController::class, 'show'])->middleware('can:viewAny,App\Models\Project');
        Route::post('projects', [ProjectController::class, 'store'])->middleware('can:create,App\Models\Project');
        Route::put('projects/{project}', [ProjectController::class, 'update'])->middleware('can:update,project');
        Route::delete('projects/{project}', [ProjectController::class, 'destroy'])->middleware('can:delete,project');
        Route::get('projects/{project}/members', [ProjectController::class, 'members'])->middleware('can:viewAny,App\Models\ProjectMember');
        Route::get('projects/{project}/activities', [ProjectController::class, 'activities'])->middleware('can:viewAny,App\Models\Activity');
        Route::get('projects/{project}/indicators', [ProjectController::class, 'indicators'])->middleware('can:viewAny,App\Models\Indicator');
        Route::get('projects/{project}/outcomes', [ProjectController::class, 'outcomes'])->middleware('can:viewAny,App\Models\Outcome');
        
        Route::post('project_members', [ProjectMemberController::class, 'store'])->middleware('can:create,App\Models\ProjectMember');
        Route::delete('project_members/{project_member}', [ProjectMemberController::class, 'destroy'])->middleware('can:delete,project_member');
        
        Route::get('countries', [CountryController::class, 'index'])->middleware('can:viewAny,App\Models\Country');
        Route::get('countries/{country}', [CountryController::class, 'show'])->middleware('can:viewAny,App\Models\Country');
        Route::post('countries', [CountryController::class, 'store'])->middleware('can:create,App\Models\Country');
        Route::put('countries/{country}', [CountryController::class, 'update'])->middleware('can:update,country');
        Route::delete('countries/{country}', [CountryController::class, 'destroy'])->middleware('can:delete,country');
        Route::get('countries/{country}/projects', [CountryController::class, 'projects'])->middleware('can:viewAny,App\Models\Project');  
        Route::get('countries/{country}/users', [CountryController::class, 'users'])->middleware('can:viewAny,App\Models\User');  
        
        Route::get('outcomes', [OutcomeController::class, 'index'])->middleware('can:viewAny,App\Models\Outcome');
        Route::get('outcomes/{outcome}', [OutcomeController::class, 'show'])->middleware('can:viewAny,App\Models\Outcome');
        Route::post('outcomes', [OutcomeController::class, 'store'])->middleware('can:create,App\Models\Outcome');
        Route::put('outcomes/{outcome}', [OutcomeController::class, 'update'])->middleware('can:update,outcome');
        Route::delete('outcomes/{outcome}', [OutcomeController::class, 'destroy'])->middleware('can:delete,outcome');
        
        Route::get('activities', [ActivityController::class, 'index'])->middleware('can:viewAny,App\Models\Activity');
        Route::get('activities/{activity}', [ActivityController::class, 'show'])->middleware('can:viewAny,App\Models\Activity');
        Route::post('activities', [ActivityController::class, 'store'])->middleware('can:create,App\Models\Activity');
        Route::put('activities/{activity}', [ActivityController::class, 'update'])->middleware('can:update,activity');
        Route::delete('activities/{activity}', [ActivityController::class, 'destroy'])->middleware('can:delete,activity');
        Route::get('activities/{activity}/indicators', [ActivityController::class, 'indicators'])->middleware('can:viewAny,App\Models\Indicator');
        
        Route::get('indicators', [IndicatorController::class, 'index'])->middleware('can:viewAny,App\Models\Indicator');
        Route::get('indicators/{indicator}', [IndicatorController::class, 'show'])->middleware('can:viewAny,App\Models\Indicator');
        Route::post('indicators', [IndicatorController::class, 'store'])->middleware('can:create,App\Models\Indicator');
        Route::put('indicators/{indicator}', [IndicatorController::class, 'update'])->middleware('can:update,indicator');
        Route::delete('indicators/{indicator}', [IndicatorController::class, 'destroy'])->middleware('can:delete,indicator'); 
        Route::get('indicators/{indicator}/disaggregations', [IndicatorController::class, 'disaggregations'])->middleware('can:viewAny,App\Models\Disaggregation');
        Route::get('indicators/{indicator}/collected_data', [IndicatorController::class, 'collected_data'])->middleware('can:viewAny,App\Models\CollectedData');
        
        Route::get('disaggregations', [DisaggregationController::class, 'index'])->middleware('can:viewAny,App\Models\Disaggregation');
        Route::post('disaggregations', [DisaggregationController::class, 'store'])->middleware('can:create,App\Models\Disaggregation');
        Route::put('disaggregations/{disaggregation}', [DisaggregationController::class, 'update'])->middleware('can:update,disaggregation');
        Route::delete('disaggregations/{disaggregation}', [DisaggregationController::class, 'destroy'])->middleware('can:delete,disaggregation'); 
        
        Route::post('indicator_disaggregations', [IndicatorDisaggregationController::class, 'store'])->middleware('can:create,App\Models\IndicatorDisaggregation'); 
        Route::delete('indicator_disaggregations/{indicator_disaggregation}', [IndicatorDisaggregationController::class, 'destroy'])->middleware('can:delete,indicator_disaggregation'); 
       
        Route::get('collected_data', [CollectedDataController::class, 'index'])->middleware('can:viewAny,App\Models\CollectedData');
        Route::post('collected_data', [CollectedDataController::class, 'store'])->middleware('can:create,App\Models\CollectedData');
        Route::post('collected_data/{collected_data}', [CollectedDataController::class, 'update'])->middleware('can:update,collected_data');
        Route::delete('collected_data/{collected_data}', [CollectedDataController::class, 'destroy'])->middleware('can:delete,collected_data'); 
        
        Route::get('graphs', [GraphController::class, 'index']);
        Route::post('graphs', [GraphController::class, 'store']);
        Route::put('graphs/{graph}', [GraphController::class, 'update']);
        Route::delete('graphs/{graph}', [GraphController::class, 'destroy']); 
        
        Route::post('activity_indicators', [ActivityIndicatorController::class, 'store']);
        Route::delete('activity_indicators/{activity_indicator}', [ActivityIndicatorController::class, 'destroy']);

        Route::any('test', function () {
            return response()->json(["status" => "ok"], 200);
        });
        // ->middleware('can:create,App\Models\Post');
    });

});
