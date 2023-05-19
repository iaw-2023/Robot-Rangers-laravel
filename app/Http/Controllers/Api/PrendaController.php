<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PrendaResource;
use App\Models\Prenda;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PrendaController extends ApiController
{

    /**
     * Retorna un listado de prendas.
     * Si se especifican parametros de filtrado, se retornan las prendas filtradas.
     * De lo contrario, se retornan todas las prendas.
     * @OA\Get (
     *     path="/rest/prendas/",
     *     tags={"Prendas"},
     *     @OA\Parameter(
     *         in="query",
     *         name="categoria",
     *         required=false,
     *         @OA\Schema(type="number")
     *     ),
     *     @OA\Parameter(
     *         in="query",
     *         name="marca",
     *         required=false,
     *         @OA\Schema(type="number")
     *     ),
     *     @OA\Parameter(
     *         in="query",
     *         name="talle",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         in="query",
     *         name="color",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         in="query",
     *         name="precio",
     *         required=false,
     *         @OA\Schema(type="string", enum={"asc", "desc"})
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 type="array",
     *                 property="rows",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="id",
     *                         type="number",
     *                         example="1"
     *                     ),
     *                     @OA\Property(
     *                         property="created_at",
     *                         type="string",
     *                         example="2023-05-07 00:00:00"
     *                     ),
     *                     @OA\Property(
     *                         property="updated_at",
     *                         type="string",
     *                         example="2023-05-07 00:00:00"
     *                     ),
     *                     @OA\Property(
     *                         property="nombre",
     *                         type="string",
     *                         example="Harden II"
     *                     ),
     *                     @OA\Property(
     *                         property="marca",
     *                         type="object",
     *                         @OA\Property(
     *                             property="id",
     *                             type="number",
     *                             example="1"
     *                         ),
     *                         @OA\Property(
     *                             property="nombre",
     *                             type="string",
     *                             example="Adidas"
     *                         )
     *                     ),
     *                     @OA\Property(
     *                         property="categoria",
     *                         type="object",
     *                         @OA\Property(
     *                             property="id",
     *                             type="number",
     *                             example="1"
     *                         ),
     *                         @OA\Property(
     *                             property="nombre",
     *                             type="string",
     *                             example="Remeras"
     *                         )
     *                     ),
     *                     @OA\Property(
     *                         property="talle",
     *                         type="string",
     *                         example="xl"
     *                     ),
     *                     @OA\Property(
     *                         property="color",
     *                         type="string",
     *                         example="#FF0000"
     *                     ),
     *                     @OA\Property(
     *                         property="imagen",
     *                         type="string",
     *                         example="https://d2j6dbq0eux0bg.cloudfront.net/images/62219457/3384172981.jpg"
     *                     ),
     *                     @OA\Property(
     *                         property="precio",
     *                         type="string",
     *                         example="9999.99"
     *                     ),
     *                     @OA\Property(
     *                         property="descripcion",
     *                         type="string",
     *                         example="Edicion limitada 2023"
     *                     )
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=404,
     *          description="NOT FOUND",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Prendas not found"),
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $prendas = Prenda::query()
            ->when($request->has('categoria'), fn($query) => $query->where('categoria_id', $request->input('categoria')))
            ->when($request->has('marca'), fn($query) => $query->where('marca_id', $request->input('marca')))
            ->when($request->has('talle'), fn($query) => $query->whereRaw('LOWER(talle) = ?', [strtolower($request->input('talle'))]))
            ->when($request->has('color'), fn($query) => $query->whereRaw('LOWER(color) = ?', [strtolower($request->input('color'))]))
            ->when($request->has('precio'), fn($query) => $query->orderBy('precio', $request->input('precio')));

        $result = $prendas->get();

        if ($result->isEmpty()) {
            return response()->json(['message' => 'Prendas not found'], 404);
        }

        return PrendaResource::collection($result)->paginate(10);
    }

    /**
     * Retorna la informacion de una prenda especifica.
     * @OA\Get (
     *     path="/rest/prendas/{id}",
     *     tags={"Prendas"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=2),
     *              @OA\Property(property="created_at", type="string", example="2023-05-07 19:57:30"),
     *              @OA\Property(property="updated_at", type="string", example="2023-05-07 19:57:30"),
     *              @OA\Property(property="nombre", type="string", example="Lebron V"),
     *              @OA\Property(
     *                         property="marca",
     *                         type="object",
     *                         @OA\Property(
     *                             property="id",
     *                             type="number",
     *                             example="2"
     *                         ),
     *                         @OA\Property(
     *                             property="nombre",
     *                             type="string",
     *                             example="Nike"
     *                         )
     *                     ),
     *              @OA\Property(
     *                         property="categoria",
     *                         type="object",
     *                         @OA\Property(
     *                             property="id",
     *                             type="number",
     *                             example="2"
     *                         ),
     *                         @OA\Property(
     *                             property="nombre",
     *                             type="string",
     *                             example="Buzos"
     *                         )
     *                     ),
     *              @OA\Property(property="talle", type="string", example="s"),
     *              @OA\Property(property="color", type="string", example="#808080"),
     *              @OA\Property(
     *                         property="imagen",
     *                         type="string",
     *                         example="https://ferreira.vtexassets.com/arquivos/ids/375759-800-auto?v=637538350967900000&width=800&height=auto&aspect=true"
     *                     ),
     *              @OA\Property(property="precio", type="string", example="999999.99"),
     *              @OA\Property(property="descripcion", type="string", example="Edicion NBA")
     *         )
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="NOT FOUND",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Prenda not found"),
     *          )
     *      )
     * )
     */
    public function show(string $id)
    {
        try {
            $prenda = Prenda::findOrFail($id);
            return new PrendaResource($prenda);
        } catch (ModelNotFoundException) {
            return response()->json(['message' => 'Prenda not found'], 404);
        }
    }

}
