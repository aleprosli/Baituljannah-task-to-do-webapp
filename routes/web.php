<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodolistController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('is_premium');

//upgrade account
Route::get('/premium/upgrade', [App\Http\Controllers\UpgradeController::class, 'upgrade'])->name('upgrade:index');

//crud todo
Route::get('/todo', [TodolistController::class, 'index'])->name('todolist:index');
Route::get('/todo/create', [TodolistController::class, 'create'])->name('todolist:create');
Route::get('/todo/edit/{todolist}', [TodolistController::class, 'edit'])->name('todolist:edit');
Route::post('/todo/store', [TodolistController::class, 'store'])->name('todolist:store');
Route::post('/todo/edit/{todolist}', [TodolistController::class, 'update'])->name('todolist:update');
Route::get('/todo/delete/{todolist}', [TodolistController::class, 'destroy'])->name('todolist:delete');



