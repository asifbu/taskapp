<?php

use App\Http\Controllers\CategotyController;
use App\Http\Controllers\TaskController;
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

Route::get('/category',[CategotyController::class,'index']);
Route::post('/category/create',[CategotyController::class,'store']);
Route::get('/category/edit/{id}',[CategotyController::class,'edit']);
Route::put('/category/create',[CategotyController::class,'update']);
Route::post('/category/delete/{id}',[CategotyController::class,'destroy']);


Route::get('/task',[TaskController::class,'index']);
Route::post('/task/create',[TaskController::class,'store']);
Route::get('/task/edit/{id}',[TaskController::class,'edit']);
Route::put('/task/create',[TaskController::class,'update']);
Route::post('/task/delete/{id}',[TaskController::class,'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
