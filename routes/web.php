<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;



Route::get('/', [TodolistController::class, 'index'])->name('index');
Route::post('/', [TodolistController::class, 'store'])->name('store');
Route::put('/update/{id}', [TodolistController::class, 'update'])->name('update');
Route::delete('/todolist/{id}', [TodolistController::class, 'destroy'])->name('destroy');



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







