<?php

use App\Http\Controllers\AprendizController;
use Illuminate\Support\Facades\Route;

Route::resource('aprendices', AprendizController::class)
    ->only(['index', 'create', 'store']);