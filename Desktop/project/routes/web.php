<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// home 
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
// post product
Route::get('/post', [PostController::class, 'index']);
// create 
Route::get('/post/new', [PostController::class, 'create']);
// store product
Route::post('/post', [PostController::class, 'store']);
// detail products
Route::get('/post/{id}', [PostController::class, 'detial']);
// edit products
Route::get('/post/edit/{id}', [PostController::class, 'edit']);

Route::post('/post/update/{id}', [PostController::class, 'update']);
