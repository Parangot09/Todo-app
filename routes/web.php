<?php

use App\Http\Controllers\todoController;
use Illuminate\Support\Facades\Route;


Route::get('/',[todoController::class,'allTasks']);
Route::get('/create',[todoController::class,'addTask']);
Route::post('/new',[todoController::class,'newTask']);
Route::get('/delete/{id}',[todoController::class,'delTask']);
Route::get('/edit/{id}',[todoController::class,'editTask']);
Route::post('/update/{id}',[todoController::class,'updateTask']);
