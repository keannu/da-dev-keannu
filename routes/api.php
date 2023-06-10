<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Todo\TodoController;

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

Route::prefix('/todo')->group(function () {
    Route::get('/', [ TodoController::class, 'getTodoList' ]);
    Route::post('/', [ TodoController::class, 'createTodo' ]);
    Route::put('/{iTodoNo}', [ TodoController::class, 'updateTodo' ]);
    Route::delete('/{iTodoNo}', [ TodoController::class, 'deleteTodo' ]);
});
