<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
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

Route::get('/', [TaskController::class, 'index']);

Route::post('/register', [AuthController::class, 'createUser']);

Route::post('/login', [AuthController::class, 'loginUser']);

Route::Post('/task/create', [TaskController::class, 'create']);

Route::get('/task/update/{task}', [TaskController::class, 'update']);

Route::delete('/task/destroy/{task}', [TaskController::class, 'destroy']);
