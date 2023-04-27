<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDetallePedidoRequest;
use App\Http\Requests\UpdateDetallePedidoRequest;
use App\Models\DetallePedido;

class DetallePedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('detallePedidos.index', ['detallePedidos'=>DetallePedido::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('detallePedidos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDetallePedidoRequest $request)
    {
        DetallePedido::create([$request->validated()]);
        return back()->with('message', 'Detalle Pedido has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('detallePedidos.show', ['detallePedidos', DetallePedido::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('detallePedidos.edit',['detallePedidos' => DetallePedido::where('id', $id)->first()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDetallePedidoRequest $request, string $id)
    {
        DetallePedido::where('id', $id)->update($request->validated());
        return back()->with('message', 'Detalle Pedido has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DetallePedido::destroy($id);
        return back()->with('message', 'Detalle Pedido has been deleted.');
    }
}
