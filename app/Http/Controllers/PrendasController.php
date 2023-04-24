<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prenda;

class PrendasController extends Controller
{
    public function index(){ 
        $prendas = Prenda::all();
        
        if ($prendas->count() > 0) {
            return response()->json(['status'=>200,'prendas'=>$prendas], 200);
        } else {
            return response()->json(['status'=>404,'no prendas found'], 404);
        }
    }
}
