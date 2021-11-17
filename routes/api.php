<?php

use App\Http\Controllers\ApiUsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('login', [AuthController::class, "login"]);

Route::get('logout', [AuthController::class, "logout"])->middleware('auth:api');
Route::get('getUser', [AuthController::class, "getUSer"])->middleware(['auth:api']);

Route::any('/', function(){
    return response()->json([
        'error' => 'Bad Request'
    ], 400);
})->name('error');

Route::apiResource('usuario', ApiUsuarioController::class)->middleware(['auth:api']);