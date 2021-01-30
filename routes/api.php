<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('clear_cache', function () {
    \Artisan::call('cache:clear');
    \Artisan::call('optimize:clear');
    \Artisan::call('config:clear');
    \Artisan::call('route:clear');
    \Artisan::call('view:clear');
    \Artisan::call('event:clear');
    \Artisan::call('event:cache');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'v1.0'

], function ($router) {
    // Auth Routes
    Route::prefix('auth')->group(function () {
        Route::post('/login', [\App\Http\Controllers\AuthsController::class, 'login']);
        Route::post('/register', [\App\Http\Controllers\AuthsController::class, 'register']);
        Route::post('/logout', [\App\Http\Controllers\AuthsController::class, 'logout']);
        Route::post('/refresh',  [\App\Http\Controllers\AuthsController::class, 'refresh']);
    });

    Route::get('/user-profile',  [\App\Http\Controllers\AuthsController::class, 'userProfile']);
});
