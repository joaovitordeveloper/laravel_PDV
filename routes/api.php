<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InstitutionsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('user/get-all-users', [UserController::class, 'index']);
Route::get('user/get-user', [UserController::class, 'search']);
Route::post('user/register', [UserController::class, 'create']);
Route::put('user/update', [UserController::class, 'update']);
Route::delete('user/delete', [UserController::class, 'delete']);

Route::get('institutions/get-all-users', [InstitutionsController::class, 'index']);
Route::get('institutions/get-user', [InstitutionsController::class, 'search']);
Route::post('institutions/register', [InstitutionsController::class, 'create']);
Route::put('institutions/update', [InstitutionsController::class, 'update']);
Route::delete('institutions/delete', [InstitutionsController::class, 'delete']);
