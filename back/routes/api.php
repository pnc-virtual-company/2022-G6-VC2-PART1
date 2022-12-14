<?php

use App\Http\Controllers\LeaveController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

/**
 * STUDENT ROUT
 */
Route::post('/students/login',[StudentController::class,'login']);
// user Rout appi (/users)
Route::post('/login', [UserController::class, 'login']);
Route::post('/createUser', [UserController::class, 'createUser']);


Route::group(['middleware' => ['auth:sanctum']], function () {


    Route::get('/users', [UserController::class, 'getUsers']);
    Route::put('/users/{id}', [UserController::class, 'updateUser']);
    Route::put('/users/profile/{id}', [UserController::class, 'updateUserProfile']);
    Route::delete('/users/{id}', [UserController::class, 'destroyUser']);
    Route::get('/users/{id}', [UserController::class, 'getUser']);
    Route::post('/logout', [UserController::class, 'logout']);
    Route::patch('change/{id}',[UserController::class,'resetAdminPassword']);
    
    /**
     * Leave request route
     * 
     * @return leave data
     */
    Route::get('leave', [LeaveController::class, 'getAllLeave']);
    Route::get('leave/{id}', [LeaveController::class, 'getAllLeaveWithUser']);
    Route::get('leave/status/{status}', [LeaveController::class, 'getAllLeaveWithStatus']);
    Route::post('leave', [LeaveController::class, 'createLeave']);
    Route::put('leave/{id}', [LeaveController::class, 'updateLeave']);
    Route::delete('leave/{id}', [LeaveController::class, 'deleteLeave']);

    /*
    *STUDENT ROUTE
     */
    Route::post('/students/register',[StudentController::class,'store']);
    Route::post('/students/logout',[StudentController::class,'logout']);
    Route::get('students',[StudentController::class,'index']);
    Route::get('students/{id}',[StudentController::class,'show']);
    Route::put('students/{id}',[StudentController::class,'update']);
    Route::put('students/update_image/{id}',[StudentController::class,'updateImage']);
    Route::delete('students/{id}',[StudentController::class,'destroy']);
    Route::patch('resetStudentPassword/{id}',[StudentController::class,'resetPassword']);
});





