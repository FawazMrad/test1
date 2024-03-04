<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\SubjectController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('/signUp', [AuthController::class, 'signUp']);
Route::post('/signIn', [AuthController::class, 'signIn']);
Route::get('/lang/test', [AuthController::class, 'langTest']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/signOut', [AuthController::class, 'signOut']);
        Route::post('/subject/add',[SubjectController::class,'add']);
        Route::get('/subject/get',[SubjectController::class,'get']);
        Route::post('/subject/search',[SubjectController::class,'search']);
        Route::post('/subject/update',[SubjectController::class,'update']);
    });
