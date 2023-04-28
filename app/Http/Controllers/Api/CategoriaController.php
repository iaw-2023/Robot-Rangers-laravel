<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        
        if ($categorias->count() > 0) {
            return response()->json(['status'=>200,'categorias'=>$categorias], 200);
        } else {
            return response()->json(['status'=>404,'No categorias found.'], 404);
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
    public function store(StoreCategoriaRequest $request)
    {
        $validator = $request->validate();

        if($validator) {
            Categoria::create([$validator]);
            return response()->json(['status'=>200, 'message'=>'Categoria has been created.'], 200);
        } else {
            return response()->json(['status'=>404, 'message'=>'ERROR: Categoria has not been created.'], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Categoria::find($id);

        if($categoria){
            return response()->json(['status'=>200, 'categoria'=>$categoria], 200);
        } else {
            return response()->json(['status'=>404, 'message'=> 'Categoria has not found.'], 404);
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
    public function update(UpdateCategoriaRequest $request, string $id)
    {
        $validator = $request->validate();
        $categoria = Categoria::find($id);

        if($validator && $categoria) {
            $categoria->update([$validator]);
            return response()->json(['status'=>200, 'message'=>'Categoria has been updated.'], 200);
        } else {
            return response()->json(['status'=>404, 'message'=>'ERROR: Categoria has not been updated.'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::find($id);

        if($categoria){
            $categoria->delete();
            return response()->json(['status'=>200, 'message'=>'Categoria has been deleted.'], 200);
        } else {
            return response()->json(['status'=>404, 'message'=>'ERROR: Categoria has not been deleted.'], 404);
        }
    }
}
