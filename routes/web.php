<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\FootballController;

Route::get('/api/football/{path}', [FootballController::class, 'proxy'])->where('path', '.*');
