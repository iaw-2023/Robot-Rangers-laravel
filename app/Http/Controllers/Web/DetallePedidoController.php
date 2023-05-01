<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\DetallePedido;

class DetallePedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detallePedidos = DetallePedido::orderBy('id')->get();
        return view('detallePedidos.index', ['detallePedidos'=>$detallePedidos]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detallePedido = DetallePedido::FindOrFail($id);
        return view('detallePedidos.show',['detallePedido' => $detallePedido]);
    }
}
