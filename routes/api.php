<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WebSocketController;


use Illuminate\Support\Facades\View;

// In routes/api.php

Route::get('/', function () {
    return view('index', ['errors' => null]);
});

Route::get('/', [WebSocketController::class, 'index']);

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/websocket-page', [WebSocketController::class, 'websocketPage'])->name('websocket.page');

Route::group(['middleware' => 'api'], function () {

    Route::get('/websocket-page', [WebSocketController::class, 'websocketPage'])->name('websocket.page');
    
    Route::post('/logout', [AuthController::class, 'logout']);


});

// Broadcast::routes(['prefix' => 'api', 'middleware' => ['jwt.auth']]);
