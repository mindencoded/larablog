<?php

use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\ContactController;
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
Route::resource('/dashboard/contact', ContactController::class)->only([
    'index', 'show', 'destroy'
]);

Route::get('/dashboard/home', [App\Http\Controllers\dashboard\HomeController::class, 'index'])->name('dashboard.home');
Route::get('/detail/{id}', [App\Http\Controllers\Web\WebController::class, 'detail']);
Route::get('/post-category/{id}', [App\Http\Controllers\Web\WebController::class, 'post_category']);
Route::get('/contact', [App\Http\Controllers\Web\WebController::class, 'contact'])->name('contact');
Route::get('/categories', [App\Http\Controllers\Web\WebController::class, 'categories'])->name('categories');
Auth::routes();
