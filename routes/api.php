<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\BaseController;
use \App\Http\Controllers\ColorController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// }
Route::Post('/register', [AuthController::class,"signUp"]);
Route::Post('/login',[AuthController::class,"signIn"]);
Route::Post('/logout',[AuthController::class,"logout"]);
Route::Post('/store',[ColorController::class,"store"]);
Route::Post('/show',[ColorController::class,"showdragon"]);
Route::Post('/oneshow',[ColorController::class,"showonedragon"]);
Route::Post('/newdragon',[ColorController::class,"newdragon"]);
Route::Post('/changedragon',[ColorController::class,"channgedragon"]);
Route::Post('/deletedragon',[ColorController::class,"deletedragon"]);


