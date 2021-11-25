<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\InfoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 *
 * 今回の課題
 */

Route::get("/",function(){
    return view("index");
});
Route::post("/info",[InfoController::class,"store"]);





/**
 *
 * 前回の課題
 */
Route::prefix("building")->group(function(){
    Route::get("/",[MainController::class,"showBuilding"]);
    Route::get("/{room}",[MainController::class,"showRoom"]);
});


