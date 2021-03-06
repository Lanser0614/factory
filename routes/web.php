<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [PostController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('post', [PostController::class, 'store'])->name('store');
Route::get('/crud', [PostController::class, 'crud']);
Route::get('edit/{id}', [PostController::class, 'edit']);
Route::post('update', [PostController::class, 'update'])->name('Update');
Route::get('delete/{id}', [PostController::class, 'destroy']);
