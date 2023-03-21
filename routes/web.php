<?php

use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\PostController;
use App\Http\Controllers\dashboard\UserController;
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


Route::get('/', [App\Http\Controllers\Web\WebController::class, 'index'])->name('index');

Route::resource('/dashboard/post', PostController::class);
Route::resource('/dashboard/category', CategoryController::class);
Route::resource('/dashboard/user', UserController::class);
Route::get('/dashboard/home', [App\Http\Controllers\dashboard\HomeController::class, 'index'])->name('dashboard.home');


Auth::routes();
