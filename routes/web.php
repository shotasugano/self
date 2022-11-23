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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::get('/editmove/{id}', [App\Http\Controllers\ItemController::class, 'editmove']);
    Route::POST('/editapp/{id}', [App\Http\Controllers\CitemController::class, 'editapp']);
    Route::POST('/editappdelete/{id}', [App\Http\Controllers\CitemController::class, 'editappdelete']);
});

Route::prefix('confirms')->group(function () {
    Route::get('/', [App\Http\Controllers\CitemController::class, 'index']);
    Route::get('/editmove/{id}', [App\Http\Controllers\CitemController::class, 'editmove']);
    Route::POST('/editapprove/{id}', [App\Http\Controllers\CitemController::class, 'editapprove']);
    Route::POST('/editdeny/{id}', [App\Http\Controllers\CitemController::class, 'editdeny']);
    Route::get('/editmovedelete/{id}', [App\Http\Controllers\CitemController::class, 'editmovedelete']);
    Route::POST('/editdeleteapprove/{id}', [App\Http\Controllers\CitemController::class, 'editdeleteapprove']);
    Route::post('/editdeletedeny/{id}', [App\Http\Controllers\CitemController::class, 'editdeletedeny']);
    Route::get('/editaddmove/{id}', [App\Http\Controllers\CitemController::class, 'editaddmove']);
    Route::POST('/editaddapprove/{id}', [App\Http\Controllers\CitemController::class, 'editaddapprove']);
    Route::POST('/editadddeny/{id}', [App\Http\Controllers\CitemController::class, 'editadddeny']);
});