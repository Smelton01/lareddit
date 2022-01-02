<?php

use App\Http\Controllers\TodoController;
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

Route::get('/', [TodoController::class, 'index']);
Route::post('/todos', [TodoController::class, 'save'])->name('todo.save');

Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('todo.edit');
Route::post('/edit/{id}', [TodoController::class, 'update'])->name('todo.update');

Route::delete('/delete/{id}', [TodoController::class, 'destroy'])->name('todo.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
