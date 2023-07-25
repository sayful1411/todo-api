<?php

use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// API Route
Route::post('/registration',[UserController::class,'Registration']);
Route::post('/login',[UserController::class,'Login']);


Route::middleware('tokenVerify')->group(function () {
    Route::get('/todo',[TodoController::class,'AllTodo']);
    Route::post('/todo',[TodoController::class,'TodoCreate']);
    Route::get('/todo/{id}',[TodoController::class,'TodoShow']);
    Route::put('/todo/{id}',[TodoController::class,'TodoUpdate']);
    Route::delete('/todo/{id}',[TodoController::class,'TodoDelete']);
});
