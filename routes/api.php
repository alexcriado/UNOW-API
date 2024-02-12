<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CategoriasController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/productos', [ProductosController::class, 'index']);
    Route::post('/productos', [ProductosController::class, 'store']);
    Route::get('/productos/{id}', [ProductosController::class, 'show']);
    Route::put('/productos/{id}', [ProductosController::class, 'update']);
    Route::delete('/productos/{id}', [ProductosController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/categorias', [CategoriasController::class, 'index']);
    Route::post('/categorias', [CategoriasController::class, 'store']);
    Route::get('/categorias/{id}', [CategoriasController::class, 'show']);
    Route::put('/categorias/{id}', [CategoriasController::class, 'update']);
    Route::delete('/categorias/{id}', [CategoriasController::class, 'destroy']);
});