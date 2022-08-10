<?php

use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\AdminAPI\ArticleController as ArticleAdminController;
use App\Http\Controllers\AdminAPI\AuthController;
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

Route::post('admin/login', [AuthController::class, 'login']);
Route::post('admin/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'auth.api'], function () {
    Route::apiResource('admin/article', ArticleAdminController::class);
});

Route::get('article', [ArticleController::class, 'articleLists']);
