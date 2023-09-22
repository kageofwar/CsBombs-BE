<?php

use App\Http\Controllers\HeavysController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\SitesController;
use App\Http\Controllers\TeamsController;
use App\Models\Sites;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Routes to 'maps'
Route::get('/maps', [MapController::class, 'index']);
Route::get('/maps/{id}', [MapController::class, 'search']);
Route::post('/maps', [MapController::class, 'create']);

// Routes to 'Teams'
Route::get('/teams', [TeamsController::class, 'index']);

// Routes to 'Sites'
Route::get('/sites', [SitesController::class, 'index']);

// Routes to 'Heavys'
Route::get('/heavys', [HeavysController::class, 'index']);