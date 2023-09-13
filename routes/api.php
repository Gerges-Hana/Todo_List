<?php

use App\Http\Controllers\Api\TodoListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// عرض جميع المهام
Route::get('/tasks', [TodoListController::class, 'index']);

// عرض تفاصيل مهمة محددة
Route::get('/tasks/{task}', [TodoListController::class, 'show']);

// إنشاء مهمة جديدة
Route::post('/tasks', [TodoListController::class, 'store']);

// تحديث مهمة محددة
Route::put('/tasks/{task}', [TodoListController::class, 'update']);
Route::patch('/tasks/{task}', [TodoListController::class, 'update']);

// حذف مهمة محددة
Route::delete('/tasks/{task}', [TodoListController::class, 'destroy']);
