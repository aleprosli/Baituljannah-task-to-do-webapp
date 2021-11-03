<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TodolistController;

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
Route::post('/login', [AuthController::class,'login']);
Route::post('/register', [AuthController::class,'register']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->middleware('auth:api')->group(function(){
    Route::get('/todolist', [TodolistController::class,'index']);
    Route::post('/todolist/create', [TodolistController::class,'store']);
    Route::post('/todolist/update/{todolist}', [TodolistController::class,'update']);
    Route::delete('/todolist/delete/{todolist}', [TodolistController::class,'delete']);
});
