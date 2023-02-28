<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\SiteController as ApiSiteController;

/* API HTTP REQUESTS */

Route::get('/list', [ApiSiteController::class, 'index']);

Route::post('/create', [ApiSiteController::class, 'store']);

Route::get('/show/{id}', [ApiSiteController::class, 'show']);

Route::put('/update/{id}', [ApiSiteController::class, 'update']);

Route::delete('/delete/{id}', [ApiSiteController::class, 'destroy']);

Route::patch('/recover/{id}', [ApiSiteController::class, 'recover']);

Route::patch('/inactivate/{id}', [ApiSiteController::class, 'inactivate']);

Route::get('/filter', [ApiSiteController::class, 'filter']);