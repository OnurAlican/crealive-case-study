<?php

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

Route::resource('/',\App\Http\Controllers\IndexController::class);
Route::get('/{id}',[\App\Http\Controllers\IndexController::class,"show"]);
Route::get('search/{id}',[\App\Http\Controllers\IndexController::class,"search"]);
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories',\App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('contents',\App\Http\Controllers\Admin\ContentController::class);
});
