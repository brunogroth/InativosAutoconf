<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SiteController::class, 'index'])->name('list');

Route::get('/create', [SiteController::class, 'create'])->name('create');

Route::post('/store', [SiteController::class, 'store'])->name('store');

Route::get('/edit/{id}', [SiteController::class, 'edit'])->name('edit');

Route::put('/update', [SiteController::class, 'update'])->name('update');

// Quando a saída de um cliente (churn) é recuperado
Route::patch('/recover', [SiteController::class, 'recover'])->name('recover');