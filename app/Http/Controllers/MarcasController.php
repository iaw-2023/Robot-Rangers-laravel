<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marca;

class MarcasController extends Controller
{
    public function index(){ 
        $marcas = Marca::all();
        
        if ($marcas->count() > 0) {
            return response()->json(['status'=>200,'marcas'=>$marcas], 200);
        } else {
            return response()->json(['status'=>404,'no marcas found'], 404);
        }
    }
}
