<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriasController extends Controller
{
    public function index(){ 
        $categorias = Categoria::all();
        
        if ($categorias->count() > 0) {
            return response()->json(['status'=>200,'categorias'=>$categorias], 200);
        } else {
            return response()->json(['status'=>404,'no categorias found'], 404);
        }
    }
}
