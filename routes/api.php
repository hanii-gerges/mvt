<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\QuestionController;
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


Route::middleware('auth:api')->group(function()
{
    Route::get('/users/me', [AuthController::class,'userInfo']);
});
// make route resources              ##

Route::post('/users/register', [AuthController::class,'register']);
Route::post('/users/login', [AuthController::class,'login']);
Route::get('/users',[UserController::class,'index']);
Route::get('/users/{user}',[UserController::class,'show']);

Route::get('/articles',[ArticleController::class,'index']);
Route::post('/articles',[ArticleController::class,'store']);
Route::get('articles/{article}',[ArticleController::class,'show']);
Route::put('/articles/{article}',[ArticleController::class,'update']); //change from form-data to x-www-form-urlencoded 
Route::delete('/articles/{article}',[ArticleController::class,'destroy']);

Route::get('/questions',[QuestionController::class,'index']);
Route::post('/questions',[QuestionController::class,'store']);
Route::get('questions/{question}',[QuestionController::class,'show']);
Route::put('/questions/{question}',[QuestionController::class,'update']); //change from form-data to x-www-form-urlencoded 
Route::delete('/questions/{question}',[QuestionController::class,'destroy']);





