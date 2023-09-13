<?php

use App\Http\Controllers\TodoListController;
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

Route::get('/', function () {
    return view('index');
});
Route::get('/', [TodoListController::class, 'index'])->name('todo_list.index');
Route::post('/task', [TodoListController::class, 'store'])->name('todo_list.store');
Route::delete('/task/{id}', [TodoListController::class, 'destroy'])->name('todo_list.destroy');
Route::get('/tasks/{task}/edit', [TodoListController::class, 'edit'])->name('todo_list.edit');
Route::put('/tasks/{task}', [TodoListController::class, 'update'])->name('todo_list.update');

