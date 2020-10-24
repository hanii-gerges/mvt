<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::post('/users/register', [AuthController::class,'register']);
Route::post('/users/login', [AuthController::class,'login']);

Route::middleware('auth:api')->group(function()
{
    Route::post('/users/me', [AuthController::class,'userInfo']);
});

