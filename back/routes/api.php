<?php

use App\Http\Controllers\LeaveController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// user Rout appi (/users)
Route::post('/login', [UserController::class, 'login']);
Route::post('/createUser', [UserController::class, 'createUser']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/users', [UserController::class, 'getUsers']);
    Route::put('/users/{id}', [UserController::class, 'updateUser']);
    Route::delete('/users/{id}', [UserController::class, 'destroyUser']);
    Route::get('/users/{id}', [UserController::class, 'getUser']);
    Route::post('/logout', [UserController::class, 'logout']);
});

//Rout leave Table
Route::get('leave', [PermissionController::class, 'getAllLeave']);
Route::post('leave', [PermissionController::class, 'createLeave']);
Route::put('leave/{id}', [PermissionController::class, 'updateLeave']);
Route::delete('leave/{id}', [PermissionController::class, 'deleteLeave']);