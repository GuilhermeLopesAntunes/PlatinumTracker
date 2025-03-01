<?php

use App\Http\Controllers\GamesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/games');
});


Route::resource('games', GamesController::class)
    ->except('show');

