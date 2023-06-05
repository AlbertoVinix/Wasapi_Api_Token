<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/wasapi/login', [\App\Http\Controllers\UserController::class, 'authenticate']);


Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('/wasapi/get', [\App\Http\Controllers\WasapiController::class, 'getWasapi']);
    /*AÑADE AQUI LAS RUTAS QUE QUIERAS PROTEGER CON JWT*/
});
