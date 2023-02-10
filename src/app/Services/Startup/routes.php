<?php

use App\Services\Startup\Interfaces\Http\Controllers\IndexStartupController;
use Illuminate\Support\Facades\Route;

Route::get('/v1/startup/message', [IndexStartupController::class, 'index']);
