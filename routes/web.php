<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'index']);
Route::get('contacts', [MainController::class, 'contacts'])->name('mail');
Route::post('contacts', [MainController::class, 'getContactsForm'])->name('mailHandler');

Route::resource('categories', CategoryController::class);
Route::resource('articles', ArticleController::class);