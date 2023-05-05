<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Prendas\StorePrendaRequest;
use App\Http\Requests\Prendas\UpdatePrendaRequest;
use App\Models\Prenda;

class PrendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prendas = Prenda::orderBy('id')->get();
        return view('prendas.index', ['prendas'=>$prendas]);
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
        Prenda::create($request->validated());
        return redirect('prendas')->with('success', 'Prenda has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prenda = Prenda::with(['marca', 'categoria'])->findOrFail($id);
        return view('prendas.show',['prenda' => $prenda]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prenda = Prenda::FindOrFail($id);
        return view('prendas.edit',['prenda' => $prenda]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrendaRequest $request, string $id)
    {
        Prenda::where('id', $id)->update($request->validated());
        return redirect('prendas')->with('success', 'Prenda has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Prenda::destroy($id);
        return redirect('prendas')->with('success', 'Prenda has been deleted.');
    }
}
