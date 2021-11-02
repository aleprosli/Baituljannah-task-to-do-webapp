<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\UpgradeController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('is_premium');

//upgrade account
Route::get('/premium/index', [UpgradeController::class, 'upgrade'])->name('upgrade:index');
Route::get('/premium/upgrade', [UpgradeController::class, 'upgradeIsPremium'])->name('upgrade:update');

//crud todo
Route::get('/todo', [TodolistController::class, 'index'])->name('todolist:index');
Route::get('/todo/create', [TodolistController::class, 'create'])->name('todolist:create');
Route::get('/todo/edit/{todolist}', [TodolistController::class, 'edit'])->name('todolist:edit');
Route::post('/todo/store', [TodolistController::class, 'store'])->name('todolist:store');
Route::post('/todo/edit/{todolist}', [TodolistController::class, 'update'])->name('todolist:update');
Route::get('/todo/delete/{todolist}', [TodolistController::class, 'destroy'])->name('todolist:delete');

//notify reminder
Route::get('/reminder/{todolist}', [TodolistController::class, 'reminder'])->name('todolist:reminder');

//audit route
Route::get('/audit/log', [AuditController::class, 'index'])->name('audit:index');




