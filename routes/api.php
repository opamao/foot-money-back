<?php

use App\Http\Controllers\ApiJoueursControllers;
use App\Http\Controllers\ApiUsersControllers;
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
