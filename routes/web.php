<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;
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
    return redirect()->route('product.index');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('product', ProductController::class);
    Route::resource('article', ArticleController::class);
    Route::resource('tag',TagController::class);
    // Route::get('product', [ProductController::class, 'index'])->name('product.index');
    // Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
    // Route::post('product', [ProductController::class, 'store'])->name('product.store');
    // Route::get('product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    // Route::put('product/{product}', [ProductController::class, 'update'])->name('product.update');
    // Route::get('product/{product}', [ProductController::class, 'show'])->name('product.show');
    // Route::delete('product/{product}', [ProductController::class, 'delete'])->name('product.destroy);

    Route::get('user/logout', [UserController::class, 'logout'])->name('user.logout');
});

Route::get('user/register', [UserController::class, 'register'])->name('user.show-register');
Route::post('user/register', [UserController::class, 'createUser'])->name('user.store');
Route::get('user/login', [UserController::class, 'loginForm'])->name('login.form');
Route::post('user/login', [UserController::class, 'login'])->name('user.login');