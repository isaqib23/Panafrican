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
    'middleware' => ['log.route','api'],
    'prefix' => 'v1.0'

], function ($router) {
    // Auth Routes
    Route::prefix('auth')->group(function () {
        Route::post('/login', [\App\Http\Controllers\AuthsController::class, 'login']);
        Route::post('/logout', [\App\Http\Controllers\AuthsController::class, 'logout']);
        Route::post('/refresh_token',  [\App\Http\Controllers\AuthsController::class, 'refresh']);
    });

    Route::get('/profile',  [\App\Http\Controllers\AuthsController::class, 'userProfile']);
    Route::get('/regions',  [\App\Http\Controllers\AuthsController::class, 'regions_list']);

    // Location Routes
    Route::prefix('locations')->group(function () {
        Route::post('/all', [\App\Http\Controllers\LocationController::class, 'index']);
        Route::post('/create', [\App\Http\Controllers\LocationController::class, 'store']);
    });

    // Accounts Routes
    Route::prefix('accounts')->group(function () {
        Route::post('/all', [\App\Http\Controllers\AccountsController::class, 'index']);
        Route::post('/create', [\App\Http\Controllers\AccountsController::class, 'store']);
    });

    // Branch Routes
    Route::prefix('branch')->group(function () {
        Route::post('/all', [\App\Http\Controllers\BranchesController::class, 'index']);
        Route::post('/create', [\App\Http\Controllers\BranchesController::class, 'store']);
        Route::post('/get_by_account', [\App\Http\Controllers\BranchesController::class, 'getByAccount']);
    });

    // Leads Routes
    Route::prefix('leads')->group(function () {
        Route::post('/all', [\App\Http\Controllers\LeadsController::class, 'index']);
        Route::post('/create', [\App\Http\Controllers\LeadsController::class, 'store']);
        Route::post('/get_by_id', [\App\Http\Controllers\LeadsController::class, 'getLeadById']);
        Route::post('/delete_by_id', [\App\Http\Controllers\LeadsController::class, 'delete']);
    });

    // Users Routes
    Route::prefix('users')->group(function () {
        Route::post('/list', [\App\Http\Controllers\UsersController::class, 'index']);
    });

    // Notes Routes
    Route::prefix('notes')->group(function () {
        Route::post('/all', [\App\Http\Controllers\NotesController::class, 'index']);
        Route::post('/create', [\App\Http\Controllers\NotesController::class, 'store']);
    });

    // Opportunity Routes
    Route::prefix('opportunities')->group(function () {
        Route::post('/all', [\App\Http\Controllers\OpportunitiesController::class, 'index']);
        Route::post('/create', [\App\Http\Controllers\OpportunitiesController::class, 'store']);
        Route::post('/get_by_id', [\App\Http\Controllers\OpportunitiesController::class, 'getOpportunityById']);
        Route::post('/delete_by_id', [\App\Http\Controllers\OpportunitiesController::class, 'delete']);
    });

    // Activities Routes
    Route::prefix('activities')->group(function () {
        Route::post('/all', [\App\Http\Controllers\ActivitiesController::class, 'index']);
        Route::post('/create', [\App\Http\Controllers\ActivitiesController::class, 'store']);
        Route::post('/get_by_id', [\App\Http\Controllers\ActivitiesController::class, 'getActivityById']);
        Route::post('/delete_by_id', [\App\Http\Controllers\ActivitiesController::class, 'delete']);
    });

    // Contacts Routes
    Route::prefix('contacts')->group(function () {
        Route::post('/all', [\App\Http\Controllers\ContactController::class, 'index']);
        Route::post('/create', [\App\Http\Controllers\ContactController::class, 'store']);
        Route::post('/get_by_id', [\App\Http\Controllers\ContactController::class, 'getContactById']);
        Route::post('/delete_by_id', [\App\Http\Controllers\ContactController::class, 'delete']);
    });

    // Supplier Routes
    Route::prefix('suppliers')->group(function () {
        Route::post('/all', [\App\Http\Controllers\SuppliersController::class, 'index']);
        Route::post('/create', [\App\Http\Controllers\SuppliersController::class, 'store']);
        Route::post('/get_by_id', [\App\Http\Controllers\SuppliersController::class, 'getSupplierById']);
        Route::post('/delete_by_id', [\App\Http\Controllers\SuppliersController::class, 'delete']);
    });

    // Quotes Routes
    Route::prefix('quotes')->group(function () {
        Route::post('/all', [\App\Http\Controllers\QuotesController::class, 'index']);
        Route::post('/create', [\App\Http\Controllers\QuotesController::class, 'store']);
        Route::post('/get_by_id', [\App\Http\Controllers\QuotesController::class, 'getQuoteById']);
        Route::post('/delete_by_id', [\App\Http\Controllers\QuotesController::class, 'delete']);
    });

    // Sale Target Routes
    Route::prefix('sales')->group(function () {
        Route::post('/all', [\App\Http\Controllers\SaleTargetsController::class, 'index']);
        Route::post('/create', [\App\Http\Controllers\SaleTargetsController::class, 'store']);
        Route::post('/get_by_id', [\App\Http\Controllers\SaleTargetsController::class, 'getSaleById']);
        Route::post('/delete_by_id', [\App\Http\Controllers\SaleTargetsController::class, 'delete']);
    });

    // Document Routes
    Route::prefix('documents')->group(function () {
        Route::post('/all', [\App\Http\Controllers\DocumentsController::class, 'index']);
        Route::post('/create', [\App\Http\Controllers\DocumentsController::class, 'store']);
        Route::post('/get_by_id', [\App\Http\Controllers\DocumentsController::class, 'getDocumentById']);
        Route::post('/delete_by_id', [\App\Http\Controllers\DocumentsController::class, 'delete']);
    });

    // Machine Routes
    Route::prefix('machines')->group(function () {
        Route::post('/all', [\App\Http\Controllers\MachinesController::class, 'index']);
        Route::post('/create', [\App\Http\Controllers\MachinesController::class, 'store']);
        Route::post('/get_by_id', [\App\Http\Controllers\MachinesController::class, 'getMachineById']);
        Route::post('/delete_by_id', [\App\Http\Controllers\MachinesController::class, 'delete']);
    });

    // Boms Routes
    Route::prefix('boms')->group(function () {
        Route::post('/all', [\App\Http\Controllers\BomsController::class, 'index']);
        Route::post('/create', [\App\Http\Controllers\BomsController::class, 'store']);
        Route::post('/get_by_id', [\App\Http\Controllers\BomsController::class, 'getBomById']);
        Route::post('/delete_by_id', [\App\Http\Controllers\BomsController::class, 'delete']);
    });
});
