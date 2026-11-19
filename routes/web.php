<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['p' => config('portfolio')]);
})->name('home');
