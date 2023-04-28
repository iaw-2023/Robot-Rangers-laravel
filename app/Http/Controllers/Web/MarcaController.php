<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Marcas\StoreMarcaRequest;
use App\Http\Requests\Marcas\UpdateMarcaRequest;
use App\Models\Marca;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('marcas.index', ['marcas'=>Marca::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMarcaRequest $request)
    {
        Marca::create([$request->validated()]);
        return back()->with('message', 'Marca has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('marcas.show', ['marcas', Marca::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('marcas.edit',['marcas' => Marca::where('id', $id)->first()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMarcaRequest $request, string $id)
    {
        Marca::where('id', $id)->update($request->validated());
        return back()->with('message', 'Marca has been updated.');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Marca::destroy($id);
        return back()->with('message', 'Marca has been deleted.');
    }
}
