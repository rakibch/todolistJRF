<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index']);
Route::post('/add-category', [HomeController::class, 'addCategory'])->name('addCategory');
Route::post('/delete-category', [HomeController::class, 'deleteCategory'])->name('deleteCategory');
Route::post('/add-todo-task', [HomeController::class, 'addTodoTask'])->name('addTodoTask');
Route::get('/get-task-list-by-category', [HomeController::class, 'getTaskListbyCategory'])->name('getTaskListbyCategory');
Route::get('/delete-todo-list', [HomeController::class, 'deleteTodoListbyId'])->name('deleteTodoListbyId');
