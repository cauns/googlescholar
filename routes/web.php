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

Route::get('/',[App\Http\Controllers\HomeController::class, 'frontEnd'])->name('frontEnd');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('authors', App\Http\Controllers\AuthorController::class)->only([
    'index', 'show','create','store','destroy','edit'
]);
Route::get('/test',[\App\Http\Controllers\TestController::class,'index'])->name('test');
//Route::resource('articles', App\Http\Controllers\ArticleController::class);
//
//Route::resource('cites', App\Http\Controllers\CiteController::class);
//
//Route::resource('authorCiteArticles', App\Http\Controllers\AuthorCiteArticleController::class);
