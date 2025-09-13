<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('user/get-all-users', [UserController::class, 'index']);
Route::get('user/get-user', [UserController::class, 'search']);
Route::post('user/register', [UserController::class, 'create']);
Route::put('user/update', [UserController::class, 'update']);
Route::delete('user/delete', [UserController::class, 'delete']);
