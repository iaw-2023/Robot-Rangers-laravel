<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Marcas\StoreMarcaRequest;
use App\Http\Requests\Marcas\UpdateMarcaRequest;
use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{

    private $cloudinaryService;

    public function __construct(CloudinaryService $cloudinary)
    {
        $this->cloudinaryService = $cloudinary;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filtro = $request->input('filtro');
        $marcas = Marca::select('id', 'nombre', 'imagen')
            ->whereRaw('LOWER(nombre) LIKE ?', ['%'.strtolower($filtro).'%'])
            ->orderBy('id')
            ->paginate(10);    
                
        return view('marcas.index', compact('marcas', 'filtro'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMarcaRequest $request)
    {
        $requestData = $request->validated();
        $requestData["imagen"] = $this->cloudinaryService->uploadImage($request->file('imagen'));
        Marca::create($requestData);

        return redirect('marcas')->with('success', 'Marca has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Marca $marca)
    {
        return view('marcas.show',['marca' => $marca]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marca $marca)
    {
        return view('marcas.edit',['marca' => $marca]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMarcaRequest $request, Marca $marca)
    {
        $requestData = $request->validated();
        if ($request->hasFile('imagen')) {
            $this->cloudinaryService->deleteImage($marca->imagen);
            $requestData["imagen"] = $this->cloudinaryService->uploadImage($request->file('imagen'));
        }
        $marca->update($requestData);

        return redirect('marcas')->with('success', 'Marca has been updated.');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marca $marca)
    {
        if ($marca->prendas()->exists()) {
            return redirect('marcas')->with('error', 'The marca cannot be deleted because there are associated prendas.');
        }

        $marca->delete();
        return redirect('marcas')->with('success', 'Marca has been deleted.');
    }
}
