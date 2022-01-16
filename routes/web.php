<?php

use App\Http\Controllers\CategotyController;
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

Route::get('/categories',[CategotyController::class,'index'])->name('categories');
Route::get('/categories/create',[CategotyController::class,'create'])->name('categories.create');
Route::post('/categories/store',[CategotyController::class,'store'])->name('categories.store');

require __DIR__.'/auth.php';
