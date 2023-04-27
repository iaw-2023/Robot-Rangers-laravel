<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePrendaRequest;
use App\Http\Requests\UpdatePrendaRequest;

class PrendasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('prendas.index', ['prenda'=>Prenda::orderBy('id')->get()]);
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
    public function store(Request $request)
    {
        Prenda::create([$prenda => validated()]);
        return redirect(route('prendas.index'))->with('message', 'Prenda has been created.');
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
    public function update(Request $request, string $id)
    {
        Prenda::where('id', $id)->update(validated());
        return redirect(route('prendas.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Prenda::destroy($id);
        return redirect(route('prendas.index'))->with('message', 'Prenda has been deleted.');
    }
}
