<?php

use Illuminate\Support\Facades\Route;

use BeyondCode\LaravelWebSockets\Http\Controllers\WebSocketsController;

Broadcast::routes(['prefix' => 'api', 'middleware' => ['jwt.auth']]);

Route::post('broadcasting/auth', [WebSocketsController::class, 'authenticate']);

Route::get('/broadcast-user-data', [WebSocketController::class, 'broadcastUserData']);