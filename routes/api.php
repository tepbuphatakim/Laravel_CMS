<?php

use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\Admin\ArticleController as ArticleAdminController;
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

Route::apiResource('admin/articles', ArticleAdminController::class);

Route::get('articles', [ArticleController::class, 'articleLists']);
