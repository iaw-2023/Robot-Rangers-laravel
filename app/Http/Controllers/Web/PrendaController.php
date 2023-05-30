<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Prendas\StorePrendaRequest;
use App\Http\Requests\Prendas\UpdatePrendaRequest;
use App\Models\Prenda;
use App\Models\Marca;
use App\Models\Categoria;
use Illuminate\Http\Request;

class PrendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filtro = $request->input('filtro');
        $prendas = Prenda::select('id', 'nombre', 'talle', 'color', 'imagen', 'precio')
            ->whereRaw('LOWER(nombre) LIKE ?', ['%'.strtolower($filtro).'%'])
            ->orderBy('id')
            ->paginate(10);
                
        return view('prendas.index', compact('prendas', 'filtro'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marcas = Marca::orderBy('nombre')->get();
        $categorias = Categoria::orderBy('nombre')->get();
        return view('prendas.create', ['marcas' => $marcas, 'categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrendaRequest $request)
    {
        Prenda::create($request->validated());
        return redirect('prendas')->with('success', 'Prenda has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prenda $prenda)
    {
        $prenda->load(['marca', 'categoria']);
        return view('prendas.show', compact('prenda'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prenda $prenda)
    {
        $marcas = Marca::orderBy('nombre')->get();
        $categorias = Categoria::orderBy('nombre')->get();
        return view('prendas.edit',['prenda' => $prenda, 'marcas' => $marcas, 'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrendaRequest $request, Prenda $prenda)
    {
        $prenda->update($request->validated());
        return redirect('prendas')->with('success', 'Prenda has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prenda $prenda)
    {
        $prenda->delete();
        return redirect('prendas')->with('success', 'Prenda has been disabled.');
    }
}
