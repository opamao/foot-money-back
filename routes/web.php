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
Route::get('matchs', function () {
    return view('matchs.matchs');
});
Route::get('news', function () {
    return view('news.news');
});
Route::get('stades', function () {
    return view('stades.stades');
});
Route::get('users', function () {
    return view('users.users');
});

// Retour 404
Route::fallback(function () {
    return view('errors.404');
});
