<?php

use App\Http\Controllers\MovementController;
use App\Http\Controllers\PersonalRecordController;
use App\Http\Controllers\UserController;
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

Route::prefix('movement')->group(function () {
    Route::post('/', [MovementController::class, 'postNewMovement']);
    Route::get('/{id}', [MovementController::class, 'getMovementById'])->where('id', '[0-9]+');
    Route::get('/todos', [MovementController::class, 'getAllMovements']);
    Route::put('/atualizar/{id}', [MovementController::class, 'putMovement']);
    Route::delete('/deletar/{id}', [MovementController::class, 'deleteMovement']);
});

Route::prefix('personalRecord')->group(function () {
    Route::post('/', [PersonalRecordController::class, 'postNewPersonalRecord']);
    Route::get('/ranking', [PersonalRecordController::class, 'getRankingPersonalRecords']);
});

Route::prefix('user')->group(function () {
    Route::post('/', [UserController::class, 'postNewUser']);
    Route::get('/{id}', [UserController::class, 'getUserById'])->where('id', '[0-9]+');
    Route::get('/todos', [UserController::class, 'getAllUsers']);
    Route::put('/atualizar/{id}', [UserController::class, 'putUser']);
    Route::delete('/deletar/{id}', [UserController::class, 'deleteUser']);
});
