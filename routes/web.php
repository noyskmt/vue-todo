<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// 管理者
Route::get('/admin', [UserController::class, 'index'])->name('admin');


Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
Route::post('/todos/store', [TodoController::class, 'store'])->name('todos.store');
// Route::get('edit/{id}', [TodoController::class, 'edit'])->name('todos.edit');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
