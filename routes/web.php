<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});
Route::get('index', function () {
    return view('dashboard.index');
});
Route::get('forgot', function () {
    return view('auth.forgot-password');
});
Route::get('clubs', function () {
    return view('clubs.clubs');
});
Route::get('details-clubs', function () {
    return view('clubs.clubs-details');
});

// Retour 404
Route::fallback(function () {
    return view('errors.404');
});
