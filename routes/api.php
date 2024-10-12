<?php

use App\Http\Controllers\ApiActualitesControllers;
use App\Http\Controllers\ApiDonsControllers;
use App\Http\Controllers\ApiJoueursControllers;
use App\Http\Controllers\ApiMatchsControllers;
use App\Http\Controllers\ApiUsersControllers;
use App\Http\Controllers\ApiVotesControllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Api utilisateur authentification
Route::post('loginUser', [ApiUsersControllers::class, 'postLoginUser']);
Route::post('createUser', [ApiUsersControllers::class, 'postCreateUser']);
Route::post('photoUser', [ApiUsersControllers::class, 'postPhotoUser']);
Route::post('addEmailUser', [ApiUsersControllers::class, 'postAddEmailUser']);

// Api joueur authentification
Route::post('loginJoueur', [ApiJoueursControllers::class, 'postLoginJoueur']);
Route::post('photoJoueur', [ApiJoueursControllers::class, 'postPhotoJoueur']);
Route::post('addEmailJoueur', [ApiJoueursControllers::class, 'postAddEmailJoueur']);


// Actualités
Route::get('news', [ApiActualitesControllers::class, 'getNews']);
Route::post('news', [ApiActualitesControllers::class, 'getAddNews']);
Route::post('vote', [ApiVotesControllers::class, 'toggleVote']);
Route::get('cumulVote/{match}', [ApiVotesControllers::class, 'cumulVote']);
Route::post('dons', [ApiDonsControllers::class, 'makeDonation']);

// Matchs
Route::get('matchs', [ApiMatchsControllers::class,'getMatchs']);
Route::get('players/{club}', [ApiMatchsControllers::class,'getPlayers']);
