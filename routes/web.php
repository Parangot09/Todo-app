<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\todoController;
use Illuminate\Support\Facades\Route;


Route::get('/',[todoController::class,'allTasks'])->middleware('auth');
Route::get('/create',[todoController::class,'addTask'])->middleware('auth');
Route::post('/new',[todoController::class,'newTask']);
Route::get('/delete/{id}',[todoController::class,'delTask']);
Route::get('/edit/{id}',[todoController::class,'editTask']);
Route::post('/update/{id}',[todoController::class,'updateTask']);
Route::get('/login',[AuthController::class,'ShowLogin'])->name('login')->middleware('guest');
Route::get('/register',[AuthController::class,'ShowRegister'])->middleware('guest');
Route::post('/login',[AuthController::class,'LoginUser']);
Route::post('/register',[AuthController::class,'RegisterUser']);
Route::post('/logout',[AuthController::class,'Logout']);
