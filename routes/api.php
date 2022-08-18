<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [LoginController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::resource('posts', PostController::class);
});

Route::get('/social-auth/{provider}', [App\Http\Controllers\SocialController::class, 'redirectToProvider']);
Route::get('/social-auth/{provider}/callback', [App\Http\Controllers\SocialController::class, 'handleProviderCallback']);
