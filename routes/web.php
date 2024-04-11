<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'submitLogin'])->name('submitLogin');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/documents', App\Http\Controllers\DocumentController::class);
    Route::get('/delete-document/{id}', [App\Http\Controllers\DocumentController::class, 'deleteDocument'])->name('deleteDocument');
    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});
