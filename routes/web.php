<?php

use App\Http\Controllers\frontend\SiteController as FrontSiteController;
use App\Http\Controllers\api\SiteController as ApiSiteController;
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

/* VIEWS */

Route::get('/', [FrontSiteController::class, 'index'])->name('list');

Route::get('/create', [FrontSiteController::class, 'create'])->name('create');

/* API HTTP REQUESTS */

Route::get('/api/list', [ApiSiteController::class, 'index']);

Route::post('/api/create', [ApiSiteController::class, 'store']);

Route::put('/api/update/{id}', [ApiSiteController::class, 'update']);

Route::delete('/api/delete/{id}', [ApiSiteController::class, 'destroy']);