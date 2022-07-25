<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Accesos\Azure\ConectarAzureController;
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

Route::get('/log-in-azure', [ConectarAzureController::class, "LoginAccounts"]);
Route::get('/redirect-azure', [ConectarAzureController::class, "RedirectAzure"]);
Route::get('/mostrar-sesiones', [ConectarAzureController::class, "MostrarSesiones"]);