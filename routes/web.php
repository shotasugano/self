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

Route::group(['middleware' => ['auth', 'can:all']], function () {
    Route::get('/items', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/items/editmove/{id}', [App\Http\Controllers\ItemController::class, 'editmove']);
    Route::get('/confirms', [App\Http\Controllers\CitemController::class, 'index']);
});

Route::group(['middleware' => ['auth', 'can:qc']], function () {
    Route::get('/confirms/editmove/{id}', [App\Http\Controllers\CitemController::class, 'editmove']);
    Route::POST('/confirms/editapprove/{id}', [App\Http\Controllers\CitemController::class, 'editapprove']);
    Route::POST('/confirms/editdeny/{id}', [App\Http\Controllers\CitemController::class, 'editdeny']);
    Route::get('/confirms/editmovedelete/{id}', [App\Http\Controllers\CitemController::class, 'editmovedelete']);
    Route::POST('/confirms/editdeleteapprove/{id}', [App\Http\Controllers\CitemController::class, 'editdeleteapprove']);
    Route::post('/confirms/editdeletedeny/{id}', [App\Http\Controllers\CitemController::class, 'editdeletedeny']);
    Route::get('/confirms/editaddmove/{id}', [App\Http\Controllers\CitemController::class, 'editaddmove']);
    Route::POST('/confirms/editaddapprove/{id}', [App\Http\Controllers\CitemController::class, 'editaddapprove']);
    Route::POST('/confirms/editadddeny/{id}', [App\Http\Controllers\CitemController::class, 'editadddeny']);
});
Route::group(['middleware' => ['auth', 'can:dv']], function () {
    Route::get('/items/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/items/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::POST('/items/editapp/{id}', [App\Http\Controllers\CitemController::class, 'editapp']);
    Route::POST('/items/editappdelete/{id}', [App\Http\Controllers\CitemController::class, 'editappdelete']);
    Route::delete('/items/historydelete/{id}', [App\Http\Controllers\HistoryController::class, 'historydelete']);
});











