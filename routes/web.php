<?php

use App\Http\Controllers\CategotyController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/categories',[CategotyController::class,'index'])->middleware(['auth'])->name('categories');
Route::get('/categories/create',[CategotyController::class,'create'])->middleware(['auth'])->name('categories.create');
Route::post('/categories/store',[CategotyController::class,'store'])->middleware(['auth'])->name('categories.store');
Route::get('/categories/{id}/edit',[CategotyController::class,'edit'])->middleware(['auth'])->name('categories.edit');
Route::put('/categories/update/{id}',[CategotyController::class,'update'])->middleware(['auth'])->name('categories.update');
Route::get('/categories/{id}/delete',[CategotyController::class,'destroy'])->middleware(['auth'])->name('categories.delete');

Route::get('/task',[TaskController::class,'index'])->middleware(['auth'])->name('task');
Route::get('/task/create',[TaskController::class,'create'])->middleware(['auth'])->name('task.create');
Route::post('/task/store',[TaskController::class,'Store'])->middleware(['auth'])->name('task.store');
Route::get('/task/{id}/edit',[TaskController::class,'edit'])->middleware(['auth'])->name('task.edit');
Route::post('task/update/{id}',[TaskController::class,'update'])->middleware(['auth'])->name('task.update');
Route::get('/task/{id}/delete',[TaskController::class,'destroy'])->middleware(['auth'])->name('task.delete');

require __DIR__.'/auth.php';
