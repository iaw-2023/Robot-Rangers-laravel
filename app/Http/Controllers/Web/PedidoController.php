<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Pedido;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedido::orderBy('id')->get();
        return view('pedidos.index', ['pedidos'=>$pedidos]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pedido = Pedido::FindOrFail($id);
        return view('pedidos.show',['pedido' => $pedido]);
    }
}
