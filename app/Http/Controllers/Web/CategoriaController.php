<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Http\Requests\Categorias\StoreCategoriaRequest;
use App\Http\Requests\Categorias\UpdateCategoriaRequest;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('categorias.index', ['categorias'=>Categoria::all()]);
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
        return back()->with('success', 'Categoria has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('categorias.show',['categoria' => Categoria::where('id', $id)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('categorias.edit', ['categoria' => Categoria::where('id', $id)->first()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoriaRequest $request, string $id)
    {
        Categoria::where('id', $id)->update($request->validated());
        return back()->with('success', 'Categoria has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Categoria::destroy($id);
        return back()->with('success', 'Categoria has been deleted.');
    }
}