<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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
//==========================PAGE==================================//
Route::get('/',                 [HomeController::class, 'index'])->name('home');
Route::resource('/category',    CategoryController::class)->only('index', 'show')->names('category');
Route::resource('/type',        TypeController::class)->only('index', 'show')->names('type');
Route::resource('/post',        PostController::class)->only('index', 'show')->names('post');


// =========================ADMIN===============================//
Route::middleware(['auth'])->name('admin.')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin.user.index');
        });
        Route::resource('/user',        UserController::class)->names('user');
        Route::resource('/category',    CategoryController::class)->names('category');
        Route::resource('/type',        TypeController::class)->names('type');
        Route::resource('/post',        PostController::class)->names('post');
        // Route::get('/category/filter/{filter}',    [CategoryController::class, 'filter'])->name('category.filter');
    });
});


require __DIR__ . '/auth.php';
