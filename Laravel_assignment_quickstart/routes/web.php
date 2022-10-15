<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ToDoListController;

/**
 * Display All Tasks
 */
Route::get('/', [ToDoListController::class, 'index']);

/**
 * Add A New Task
 */
Route::post('/task', [ToDoListController::class, 'store']);

/**
 * Delete An Existing Task
 */
Route::delete('/task/{id}', [ToDoListController::class, 'delete']);

