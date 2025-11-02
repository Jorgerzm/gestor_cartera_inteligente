<?php
// Rutas CRUD para operaciones
Route::apiResource('operaciones', App\Http\Controllers\OperacionController::class);

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


// Ruta de prueba para verificar el backend
Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});

// Rutas CRUD para clientes
Route::apiResource('clientes', App\Http\Controllers\ClienteController::class);
