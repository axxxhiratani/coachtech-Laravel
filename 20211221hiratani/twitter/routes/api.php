<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FavoriteControllre;
use App\Http\Controllers\CommentControllre;
use App\Http\Controllers\InvestigateController;

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

Route::apiResource("/v1/user",UserController::class)->only([
    "store","show"
]);

Route::apiResource("/v1/post",PostController::class)->only([
    "index","store","show","destroy"
]);

Route::apiResource("/v1/favorite",FavoriteControllre::class)->only([
    "index","store","show","destroy"
]);

Route::apiResource("/v1/comment",CommentControllre::class)->only([
    "index","store","show","destroy"
]);


Route::prefix("v1/investigate")->group(function(){
    Route::get("/userid",[InvestigateController::class,"searchIdByUid"]);
});
