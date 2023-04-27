<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;


class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pedidos.index', ['pedidos'=>Pedido::all()]);    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('pedidos.show', ['pedidos', Pedido::findOrFail($id)]);
    }
}
