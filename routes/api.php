<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\PromotionController;
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


Route::get('/users/me', [AuthController::class,'userInfo'])->middleware('auth:sanctum');
// make route resources              ##

Route::post('/users/register', [AuthController::class,'register']);
Route::post('/users/login', [AuthController::class,'login']);
Route::get('/users/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');
Route::get('/users',[UserController::class,'index']);
Route::get('/users/{user}',[UserController::class,'show']);

Route::get('/articles',[ArticleController::class,'index']);
Route::post('/articles',[ArticleController::class,'store'])->middleware('auth:sanctum');
Route::get('/articles/{article}',[ArticleController::class,'show']);
Route::put('/articles/{article}',[ArticleController::class,'update'])->middleware('auth:sanctum'); //change from form-data to x-www-form-urlencoded 
Route::delete('/articles/{article}',[ArticleController::class,'destroy'])->middleware('auth:sanctum');

Route::get('/questions',[QuestionController::class,'index']);
Route::post('/questions',[QuestionController::class,'store'])->middleware('auth:sanctum');
Route::get('/questions/{question}',[QuestionController::class,'show']);
Route::put('/questions/{question}',[QuestionController::class,'update'])->middleware('auth:sanctum'); 
Route::delete('/questions/{question}',[QuestionController::class,'destroy'])->middleware('auth:sanctum');

Route::get('/events',[EventController::class,'index']);
Route::post('/events',[EventController::class,'store'])->middleware('auth:sanctum');
Route::get('/events/{event}',[EventController::class,'show']);
Route::put('/events/{event}',[EventController::class,'update'])->middleware('auth:sanctum');  
Route::delete('/events/{event}',[EventController::class,'destroy'])->middleware('auth:sanctum');

Route::post('/rate',[RateController::class,'addRate'])->middleware('auth:sanctum');

Route::put('/promote',[PromotionController::class,'promote'])->middleware('auth:sanctum');



