<?php

namespace App\Http\Controllers\Api;

use App\Models\Categoria;
use App\Http\Resources\CategoriaResource;

class CategoriaController extends ApiController
{
    /**
     * Retorna un listado con la informacion de todas las categorias
     * @OA\Get (
     *     path="/rest/categorias",
     *     tags={"Categorias"},
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
     *                         example="Remeras"
     *                     )
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        return CategoriaResource::collection(Categoria::all());
    }

     /**
     * Retorna la información de una categoria especifica
     * @OA\Get (
     *     path="/rest/categorias/{id}",
     *     tags={"Categorias"},
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
     *              @OA\Property(property="nombre", type="string", example="Buzos")
     *         )
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="NOT FOUND",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="No query results for model [App\\Models\\Categoria] #id"),
     *          )
     *      )
     * )
     */
    public function show(Categoria $categoria)
    {
        return new CategoriaResource($categoria);
    }
}
