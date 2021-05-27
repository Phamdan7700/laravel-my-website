<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::prefix('admin')->group(function () {
//     Route::middleware(['auth'])->group(function () {
//         Route::resource('/', UserController::class);
//         Route::resource('category', CategoryController::class);
//         Route::resource('type', TypeController::class);
//         Route::resource('post', PostController::class);
//     });
// });
Route::prefix('admin')->group(function () {
    Route::resource('/', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('type', TypeController::class);
    Route::resource('post', PostController::class);
});
