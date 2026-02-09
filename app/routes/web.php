<?php

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;

// The single route you get on a fresh install
/*
Route::get('/', function () {
    return view('welcome');
});
*/

// When at '/', redirect to the (static) course slides
Route::get('/', function (): RedirectResponse {
    return redirect('/slides');
});
