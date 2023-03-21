<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::resource('category', PostController::class)->only([
    'index'
]);

Route::get('category/all', [CategoryController::class, 'all'])->name('category.all');

Route::resource('post', CategoryController::class)->only([
    'index', 'show'
]);

Route::get('post/{category}/category', [PostController::class, 'category'])->name('post.category');
Route::get('post/{url_clean}/url_clean', [PostController::class, 'url_clean'])->name('post.url_clean');

