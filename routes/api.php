<?php

use App\Http\Controllers\crudController;
use App\Http\Controllers\demoController;
use App\Http\Controllers\userController;
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


Route::get('/show',[demoController::class,'show']);
Route::resource('photo',crudController::class);
Route::post('/register',[demoController::class,'register']);
Route::put('/update/{id}',[demoController::class,'update']);
Route::delete('/delete/{id}',[demoController::class,'delete']);
Route::post('/register',[userController::class,'signup']);
Route::post('/login',[userController::class,'login']);
Route::post('/login',[userController::class,'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('/user/{id}',[userController::class,'getUser']);
    Route::post('/logout',[userController::class,'logout']);
});
