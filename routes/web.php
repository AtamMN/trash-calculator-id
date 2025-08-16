<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CashoutController;

Route::get('/', [UserController::class, 'home'])->name('index');
Route::get('/cashout', [CashoutController::class, 'index'])->name('viewcashout');
Route::post('/', [CashoutController::class, 'add'])->name('addcashout');

Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'viewTrash'])->name('dashboard');
    Route::get('/dashboard/{id}', [AdminController::class, 'deleteTrash'])->name('admin.deletetrash');
    Route::put('/dashboard/{id}', [AdminController::class, 'updateTrash'])->name('admin.updatetrash');
    Route::get('/add_trash', [AdminController::class, 'addTrash'])->name('admin.addtrash');
    Route::post('/add_trash', [AdminController::class, 'postAddTrash'])->name('admin.postaddtrash');
});

require __DIR__ . '/auth.php';
