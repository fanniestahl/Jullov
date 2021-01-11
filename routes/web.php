<?php

use App\Http\Controllers\TasksController;
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

Route::get('/', [TasksController::class, "index"])->name("tasks.index");
Route::get('/tasks/create', [TasksController::class, "create"])->name("tasks.create");
Route::post('/', [TasksController::class, "store"])->name("tasks.store");
Route::get('/tasks/{task:id}', [TasksController::class, "show"])->name("tasks.show");
Route::get('/tasks/{task:id}/edit', [TasksController::class, "edit"])->name("tasks.edit");
Route::put('/tasks/{task:id}', [TasksController::class, "update"])->name("tasks.update");
Route::delete('/tasks/{task:id}', [TasksController::class, "destroy"])->name("tasks.destroy");
