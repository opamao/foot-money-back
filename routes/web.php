<?php

use App\Http\Controllers\ActualitesControllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubsControllers;
use App\Http\Controllers\StadesControllers;

Route::get('/', function () {
    return view('auth.login');
});
Route::get('index', function () {
    return view('dashboard.index');
});
Route::get('forgot', function () {
    return view('auth.forgot-password');
});
Route::get('details-clubs', function () {
    return view('clubs.clubs-details');
});
Route::get('matchs', function () {
    return view('matchs.matchs');
});
Route::get('users', function () {
    return view('users.users');
});
Route::post('create-player', [ClubsControllers::class, 'createPlayer']);
Route::post('update-player', [ClubsControllers::class, 'updatePlayer']);
Route::post('delete-player', [ClubsControllers::class, 'deletePlayer']);

// Retour 404
Route::fallback(function () {
    return view('errors.404');
});

Route::resource('clubs', ClubsControllers::class);
Route::resource('news', ActualitesControllers::class);
Route::resource('stades', StadesControllers::class);
