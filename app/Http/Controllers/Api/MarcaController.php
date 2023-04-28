<?php

namespace App\Http\Controllers\Api;

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
        $marcas = Marca::all();
        
        if ($marcas->count() > 0) {
            return response()->json(['status'=>200,'marcas'=>$marcas], 200);
        } else {
            return response()->json(['status'=>404,'No marcas found.'], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMarcaRequest $request)
    {
        $validator = $request->validate();

        if($validator) {
            Marca::create([$validator]);
            return response()->json(['status'=>200, 'message'=>'Marca has been created.'], 200);
        } else {
            return response()->json(['status'=>404, 'message'=>'ERROR: Marca has not been created.'], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $marca = Marca::find($id);

        if($marca){
            return response()->json(['status'=>200, 'marca'=>$marca], 200);
        } else {
            return response()->json(['status'=>404, 'message'=> 'Marca has not found.'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMarcaRequest $request, string $id)
    {
        $validator = $request->validate();
        $marca = Marca::find($id);

        if($validator && $marca) {
            $marca->update([$validator]);
            return response()->json(['status'=>200, 'message'=>'Marca has been updated.'], 200);
        } else {
            return response()->json(['status'=>404, 'message'=>'ERROR: Marca has not been updated.'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $marca = Marca::find($id);

        if($marca){
            $marca->delete();
            return response()->json(['status'=>200, 'message'=>'Marca has been deleted.'], 200);
        } else {
            return response()->json(['status'=>404, 'message'=>'ERROR: Marca has not been deleted.'], 404);
        }
    }
}
