<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\SiteController;

Route::get('sites', [SiteController::class, 'index']);