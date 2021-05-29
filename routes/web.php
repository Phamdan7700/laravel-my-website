<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    return view('index');
});
Route::resource('/category', CategoryController::class)->only('index', 'show');
Route::resource('/type', TypeController::class)->only('index', 'show');
Route::resource('/post', PostController::class)->only('index', 'show');


// =========================ADMIN=============================//
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/',                 [DashboardController::class, 'index']);
        Route::resource('/user',        UserController::class);
        Route::resource('/category',    CategoryController::class);
        Route::resource('/type',        TypeController::class);
        Route::resource('/post',        PostController::class);
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
