<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\SiteController as ApiSiteController;

/* API HTTP REQUESTS */

Route::get('/list', [ApiSiteController::class, 'index']);

Route::post('/create', [ApiSiteController::class, 'store']);

Route::put('/update/{id}', [ApiSiteController::class, 'update']);

Route::delete('/delete/{id}', [ApiSiteController::class, 'destroy']);