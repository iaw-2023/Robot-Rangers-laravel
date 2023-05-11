<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\MarcaController;
use App\Http\Controllers\Api\PrendaController;
use App\Http\Controllers\Api\PedidoController;
use App\Http\Controllers\Api\DetallePedidoController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categorias', [CategoriaController::class, 'index']);
Route::get('categorias/{categoria}', [CategoriaController::class, 'show']);

Route::get('marcas', [MarcaController::class, 'index']);
Route::get('marcas/{marca}', [MarcaController::class, 'show']);

Route::get('prendas', [PrendaController::class, 'index']);
Route::get('prendas/{prenda}', [PrendaController::class, 'show']);
Route::get('prendas/categorias/{categoria}', [PrendaController::class, 'showByCategoria']);
Route::get('prendas/marcas/{marca}', [PrendaController::class, 'showByMarca']);
Route::get('prendas/talles/{talle}', [PrendaController::class, 'showByTalle']);
Route::get('prendas/colores/{color}', [PrendaController::class, 'showByColor']);

Route::post('pedidos', [PedidoController::class, 'store']);
Route::get('pedidos/{pedido}', [PedidoController::class, 'show']);
Route::get('pedidos/clientes/{mail_cliente}', [PedidoController::class, 'showAll']);