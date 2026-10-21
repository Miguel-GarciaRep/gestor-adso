<?php

use App\Http\Controllers\AprendizController;
use App\Http\Controllers\FichaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('aprendices.index');
});

Route::resource('aprendices', AprendizController::class)
    ->only(['index', 'create', 'store']);

Route::resource('fichas', FichaController::class)
    ->only(['index', 'create', 'store']);