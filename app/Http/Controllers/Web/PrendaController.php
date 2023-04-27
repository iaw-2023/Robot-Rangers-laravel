<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Prenda;
use App\Http\Requests\Prendas\StorePrendaRequest;
use App\Http\Requests\Prendas\UpdateMarcaRequest;

class PrendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('prendas.index', ['prenda'=>Prenda::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prendas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrendaRequest $request)
    {
        Prenda::create([$request->validated()]);
        return back()->with('message', 'Prenda has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('prendas.show', ['prenda', Prenda::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('prendas.edit', ['prenda' => Prenda::where('id', $id)->first()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMarcaRequest $request, string $id)
    {
        Prenda::where('id', $id)->update($request->validated());
        return back()->with('message', 'Prenda has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Prenda::destroy($id);
        return back()->with('message', 'Prenda has been deleted.');
    }
}
