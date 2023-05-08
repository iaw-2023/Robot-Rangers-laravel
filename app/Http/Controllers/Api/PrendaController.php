<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PrendaResource;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Prenda;

class PrendaController extends ApiController
{
    /**
     * Retorna un listado con la informacion de todas las prendas
     * @OA\Get (
     *     path="/rest/prendas",
     *     tags={"Prendas"},
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
     *              @OA\Property(property="message", type="string", example="Prendas not found."),
     *          )
     *      )
     * )
     * 
     *  @return PrendaController:collection()
     */
    public function index()
    {
        return PrendaResource::collection(Prenda::all());
    }


    /**
     * Retorna la informacion de una prenda especifica
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
     *              @OA\Property(property="message", type="string", example="Prendas not found {$id}"),
     *          )
     *      )
     * )
     */
    public function show(Prenda $prenda)
    {
        return new PrendaResource($prenda);
    }

    /**
     * Retorna un listado con la informacion de las prendas de una categoria.
     * @OA\Get (
     *     path="/rest/prendas/categorias/{categoria}",
     *     tags={"Prendas"},
     *     @OA\Parameter(
     *         in="path",
     *         name="categoria",
     *         required=true,
     *         @OA\Schema(type="number")
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
     *              @OA\Property(property="message", type="string", example="Prendas not found {$categoria}"),
     *          )
     *      )
     * )
     */
    public function showByCategoria(Categoria $categoria)
    {
        $prendas = Prenda::where('categoria_id', $categoria->id)
            ->orderBy('id')
            ->get();

        return PrendaResource::collection($prendas);
    }

    /**
     * Retorna un listado con la informacion de las prendas de una marca.
     * @OA\Get (
     *     path="/rest/prendas/marcas/{marca}",
     *     tags={"Prendas"},
     *     @OA\Parameter(
     *         in="path",
     *         name="marca",
     *         required=true,
     *         @OA\Schema(type="number")
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
     *              @OA\Property(property="message", type="string", example="Prendas not found {$marca}"),
     *          )
     *      )
     * )
     */
    public function showByMarca(Marca $marca)
    {
        $prendas = Prenda::where('marca_id', $marca->id)
            ->orderBy('id')
            ->get();

        return PrendaResource::collection($prendas);
    }

    /**
     * Retorna un listado con la informacion de las prendas de un talle.
     * @OA\Get (
     *     path="/rest/prendas/talles/{talle}",
     *     tags={"Prendas"},
     *     @OA\Parameter(
     *         in="path",
     *         name="talle",
     *         required=true,
     *         @OA\Schema(type="string")
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
     *              @OA\Property(property="message", type="string", example="Prendas not found {$talle}"),
     *          )
     *      )
     * )
     */
    public function showByTalle(string $talle)
    {
        $prendas = Prenda::where('talle', $talle)
            ->orderBy('id')
            ->get();

        return PrendaResource::collection($prendas);
    }


    /**
     * Retorna un listado con la informacion de las prendas de un color.
     * @OA\Get (
     *     path="/rest/prendas/colores/{color}",
     *     tags={"Prendas"},
     *     @OA\Parameter(
     *         in="path",
     *         name="color",
     *         required=true,
     *         @OA\Schema(type="string")
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
     *              @OA\Property(property="message", type="string", example="Prendas not found {$color}"),
     *          )
     *      )
     * )
     */
    public function showByColor(string $color)
    {
        $prendas = Prenda::whereRaw('LOWER(color) = ?', [strtolower($color)])
            ->orderBy('id')
            ->get();

        return PrendaResource::collection($prendas);
    }

    /**
     * Retorna un listado con la informacion de las prendas ordenadas por precio.
     * El parámetro {order} permite ordenar de acuerdo con un criterio:
     * | order = asc (Ordenamiento de menor a mayor) |
     * | order = desc (Ordenamiento de mayor a menor) |
     * @OA\Get (
     *     path="/rest/prendas/precio/{order}",
     *     tags={"Prendas"},
     *     @OA\Parameter(
     *         in="path",
     *         name="order",
     *         required=true,
     *         @OA\Schema(type="string")
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
     *              @OA\Property(property="message", type="string", example="Prendas not found {$order}"),
     *          )
     *      )
     * )
     */
    public function showByPrecio($order = 'asc')
    {
        $prendas = Prenda::orderBy('precio', $order)->get();

        return PrendaResource::collection($prendas);
    }

}
