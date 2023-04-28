<?php

namespace App\Http\Controllers\Api;

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
        $prendas = Prenda::all();
        
        if ($prendas->count() > 0) {
            return response()->json(['status'=>200,'prendas'=>$prendas], 200);
        } else {
            return response()->json(['status'=>404,'No prendas found.'], 404);
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
    public function store(StorePrendaRequest $request)
    {
        $validator = $request->validate();

        if($validator) {
            Prenda::create([$validator]);
            return response()->json(['status'=>200, 'message'=>'Prenda has been created.'], 200);
        } else {
            return response()->json(['status'=>404, 'message'=>'ERROR: Prenda has not been created.'], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prenda = Prenda::find($id);

        if($prenda){
            return response()->json(['status'=>200, 'prenda'=>$prenda], 200);
        } else {
            return response()->json(['status'=>404, 'message'=> 'Prenda has not found.'], 404);
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
    public function update(UpdatePrendaRequest $request, string $id)
    {
        $validator = $request->validate();
        $prenda = Prenda::find($id);

        if($validator && $prenda) {
            $prenda->update([$validator]);
            return response()->json(['status'=>200, 'message'=>'Prenda has been updated.'], 200);
        } else {
            return response()->json(['status'=>404, 'message'=>'ERROR: Prenda has not been updated.'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prenda = Prenda::find($id);

        if($prenda){
            $prenda->delete();
            return response()->json(['status'=>200, 'message'=>'Prenda has been deleted.'], 200);
        } else {
            return response()->json(['status'=>404, 'message'=>'ERROR: Prenda has not been deleted.'], 404);
        }
    }
}
