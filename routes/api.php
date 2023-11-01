<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ExaminationController;
use App\Http\Controllers\Api\GoldController;
use App\Http\Controllers\Api\PawnController;
use App\Http\Controllers\Api\UserController;
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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});

Route::apiResource('/examination', ExaminationController::class);
Route::apiResource('/gold', GoldController::class);
Route::apiResource('/pawn', PawnController::class);

Route::get('/user/check/{nationalId}', [UserController::class, 'findUserByNationalId']);


// Route::get('/examination', [ExaminationController::class, 'index']);
