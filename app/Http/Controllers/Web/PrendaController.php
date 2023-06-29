<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Prendas\StorePrendaRequest;
use App\Http\Requests\Prendas\UpdatePrendaRequest;
use App\Models\Prenda;
use App\Models\Marca;
use App\Models\Categoria;
use Illuminate\Http\Request;

class PrendaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:prendas.index')->only('index');
        $this->middleware('can:prendas.create')->only('create');
        $this->middleware('can:prendas.store')->only('store');
        $this->middleware('can:prendas.show')->only('show');
        $this->middleware('can:prendas.edit')->only('edit');
        $this->middleware('can:prendas.update')->only('update');
        $this->middleware('can:prendas.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filtro = $request->input('filtro');
        $prendas = Prenda::select('id', 'nombre', 'talle', 'color', 'imagen', 'precio')
            ->whereRaw('LOWER(nombre) LIKE ?', ['%'.strtolower($filtro).'%'])
            ->orderBy('id')
            ->paginate(10);
                
        return view('prendas.index', compact('prendas', 'filtro'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marcas = Marca::orderBy('nombre')->get();
        $categorias = Categoria::orderBy('nombre')->get();
        return view('prendas.create', ['marcas' => $marcas, 'categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrendaRequest $request)
    {
        $requestData = $request->validated();
        $image = $request->file('imagen')->getRealPath();
        $cloudinaryResponse = cloudinary()->upload($image, ['folder'=>'prendas']);
        $imageUrl = $cloudinaryResponse->getSecurePath();
        $imagePublicId = $cloudinaryResponse->getPublicId();

        Prenda::create([
            'nombre' => $requestData['nombre'],
            'marca_id' => $requestData['marca_id'],
            'categoria_id' => $requestData['categoria_id'],
            'talle' => $requestData['talle'],
            'color' => $requestData['color'],
            'imagen' => $imageUrl,
            'imagen_public_id' => $imagePublicId,
            'precio' => $requestData['precio'],
            'descripcion' => $requestData['descripcion'],
        ]);

        return redirect('prendas')->with('success', 'Prenda has been created successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Prenda $prenda)
    {
        $prenda->load(['marca', 'categoria']);
        return view('prendas.show', compact('prenda'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prenda $prenda)
    {
        $marcas = Marca::orderBy('nombre')->get();
        $categorias = Categoria::orderBy('nombre')->get();
        return view('prendas.edit',['prenda' => $prenda, 'marcas' => $marcas, 'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrendaRequest $request, Prenda $prenda)
    {
        $requestData = $request->validated();
        $imageUrl = $prenda->imagen;
        $imagePublicId = $prenda->imagen_public_id;

        if ($request->hasFile('imagen')) {
            cloudinary()->destroy($prenda->imagen_public_id);
            $image = $request->file('imagen')->getRealPath();
            $cloudinaryResponse = cloudinary()->upload($image, ['folder'=>'prendas']);
            $imageUrl = $cloudinaryResponse->getSecurePath();
            $imagePublicId = $cloudinaryResponse->getPublicId();
        }
        
        $prenda->update([
            'nombre' => $requestData['nombre'],
            'marca_id' => $requestData['marca_id'],
            'categoria_id' => $requestData['categoria_id'],
            'talle' => $requestData['talle'],
            'color' => $requestData['color'],
            'imagen' => $imageUrl,
            'imagen_public_id' => $imagePublicId,
            'precio' => $requestData['precio'],
            'descripcion' => $requestData['descripcion'],
        ]);

        return redirect('prendas')->with('success', 'Prenda has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prenda $prenda)
    {
        $prenda->delete();
        return redirect('prendas')->with('success', 'Prenda has been disabled.');
    }
}
