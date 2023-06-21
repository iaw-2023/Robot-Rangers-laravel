<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:pedidos.index')->only('index');
        $this->middleware('can:pedidos.show')->only('show');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filtro = $request->input('filtro');
        $pedidos = Pedido::select('id', 'mail_cliente', 'monto', 'created_at')
            ->whereRaw('LOWER(mail_cliente) LIKE ?', ['%'.strtolower($filtro).'%'])
            ->latest()
            ->paginate(10);    

        return view('pedidos.index', compact('pedidos', 'filtro'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pedido = Pedido::with('prendas')->FindOrFail($id);
        return view('pedidos.show',['pedido' => $pedido]);
    }
}
