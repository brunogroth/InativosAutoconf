<?php

use App\Http\Controllers\frontend\SiteController as FrontSiteController;
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

Route::get('/', [FrontSiteController::class, 'index'])->name('list');


Route::get('/create', [FrontSiteController::class, 'create'])->name('create');