<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Http\Requests\Categorias\StoreCategoriaRequest;
use App\Http\Requests\Categorias\UpdateCategoriaRequest;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function __construct()
    {
        $this->middleware('can.categorias.index')->only('index');
        $this->middleware('can.categorias.create')->only('create');
        $this->middleware('can:categorias.store')->only('store');
        $this->middleware('can:categorias.show')->only('show');
        $this->middleware('can:categorias.edit')->only('edit');
        $this->middleware('can:categorias.update')->only('update');
        $this->middleware('can:categorias.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filtro = $request->input('filtro');
        $categorias = Categoria::select('id', 'nombre')
            ->whereRaw('LOWER(nombre) LIKE ?', ['%'.strtolower($filtro).'%'])
            ->orderBy('id')
            ->paginate(10);    
                
        return view('categorias.index', compact('categorias', 'filtro'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoriaRequest $request)
    {  
        Categoria::create($request->validated());
        return redirect('categorias')->with('success', 'Categoria has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return view('categorias.show',['categoria' => $categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit',['categoria' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoriaRequest $request, Categoria $categoria)
    {
        $categoria->update($request->validated());
        return redirect('categorias')->with('success', 'Categoria has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        if ($categoria->prendas()->exists()) {
            return redirect('categorias')->with('error', 'The categoria cannot be deleted because there are associated prendas.');
        }

        $categoria->delete();
        return redirect('categorias')->with('success', 'Categoría has been deleted.');
    }
}