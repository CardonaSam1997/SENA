<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\RecoveryPasswordController;
use App\Http\Controllers\Api\TaskController;

Route::get('/test', function () {
    return 'test';
});
 

Route::post('/login', [AuthController::class, 'login']);

Route::put('/users/change-password', [UserController::class, 'changePassword'])->middleware('auth:sanctum');
Route::post('/users', [UserController::class, 'store']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/register/{user}/role', [RegisterController::class, 'selectRole']);
Route::put('/users/{user}/role', [UserController::class, 'updateRole']);

Route::post('/register/{user}/professional', [RegisterController::class, 'storeProfessional']);
Route::post('/register/{user}/company', [RegisterController::class, 'storeCompany']);

Route::post('/forgot-password', [RecoveryPasswordController::class, 'sendResetLink']);


Route::middleware(['auth:sanctum', 'role:company'])->prefix('company')->group(function () {
    Route::get('/tasks', [TaskController::class, 'indexApi']);
    Route::post('/tasks', [TaskController::class, 'storeApi']);
    Route::post('/tasks/{task}', [TaskController::class, 'updateApi']);
    Route::delete('/tasks/{task}', [TaskController::class, 'destroyApi']);
});