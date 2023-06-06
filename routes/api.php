<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/wasapi/login', [\App\Http\Controllers\UserController::class, 'authenticate']);


Route::get('/wasapi/get/none', [\App\Http\Controllers\WasapiController::class, 'getWasapi']);
Route::post('/wasapi/post/none', [\App\Http\Controllers\WasapiController::class, 'getWasapi']);


Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('/wasapi/get/token', [\App\Http\Controllers\WasapiController::class, 'getWasapi']);
    Route::post('/wasapi/post/token', [\App\Http\Controllers\WasapiController::class, 'getWasapi']);
});


Route::group(['middleware' => ['basic.auth']], function () {
    Route::get('/wasapi/get/user', [\App\Http\Controllers\WasapiController::class, 'getWasapi']);
    Route::post('/wasapi/post/user', [\App\Http\Controllers\WasapiController::class, 'getWasapi']);
});
