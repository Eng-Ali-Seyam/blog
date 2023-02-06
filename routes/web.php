<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [StaticController::class,'index']);
Route::get('/about', [StaticController::class,'about']);
Route::get('/post/{id}', [StaticController::class,'show'])->name('show');

Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard/', 'index')->name('dashboard');
    Route::get('/dashboard/my_news', 'my_news')->name('my_news');
    Route::get('/dashboard/add_news', 'add_news')->name('add_news');
    Route::get('/dashboard/admin', 'admin')->name('admin');
});

Route::resource('categories',CategoryController::class);
Route::resource('news',NewsController::class);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
