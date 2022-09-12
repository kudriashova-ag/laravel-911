<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\MainController;
use App\Models\Category;
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

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/category/{category:slug}', [MainController::class, 'category'])->name('category');

require __DIR__.'/auth.php';




Route::prefix('administrator')->middleware(['auth', 'admin'])->group(function(){
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/articles', ArticleController::class);
});



Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});