<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\BookmarkController;

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

Auth::routes();

Route::get('/', [NewsController::class, 'index']);
Route::get('/interests', [NewsController::class, 'index_interests']);
Route::get('/discover', [NewsController::class, 'index_discover']);
Route::get('/saved', [BookmarkController::class, 'index']);

Route::group(['middleware' => 'auth'], function () {
    Route::post('/api/save', [BookmarkController::class, 'save'])->name('bookmark.save');
    Route::post('/api/remove', [BookmarkController::class, 'remove'])->name('bookmark.delete');
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
