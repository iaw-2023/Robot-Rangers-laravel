<?php

namespace App\Http\Controllers\Api;

use App\Models\Marca;
use App\Http\Resources\MarcaResource;

class MarcaController extends ApiController
{

     /**
     * Retorna un listado con la informacion de todas las marcas
     * 
     * @OA\Get (
     *     path="/rest/marcas",
     *     tags={"Marcas"},
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
     *                         example="Adidas"
     *                     ),
     *                     @OA\Property(
     *                         property="imagen",
     *                         type="string",
     *                         example="https://highxtar.com/wp-content/uploads/2021/04/highxtar-impossible-is-nothing-adidas-campana-1.jpg"
     *                     ),
     *                     @OA\Property(
     *                         property="descripcion",
     *                         type="string",
     *                         example="Imposible is Nothing"
     *                     )
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=404,
     *          description="NOT FOUND",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Marcas not found"),
     *          )
     *      )
     * )
     */
    public function index()
    {
        return MarcaResource::collection(Marca::all());
    }

     /**
     * Retorna la información de una marca especifica
     * 
     * @OA\Get (
     *     path="/rest/marcas/{id}",
     *     tags={"Marcas"},
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
     *              @OA\Property(property="nombre", type="string", example="Nike"),
     *              @OA\Property(property="imagen", 
     *                          type="string", 
     *                          example="https://static.ffx.io/images/$zoom_1%2C$multiply_2.1113%2C$ratio_1.777778%2C$width_485%2C$x_53%2C$y_54/t_crop_custom/q_86%2Cf_auto/f54a63f81d65d0b5b4db5f2235bbe665f5310227"),
     *              @OA\Property(property="descripcion", type="string", example="Just do it")
     *         )
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="NOT FOUND",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Marca not found {$id}"),
     *          )
     *      )
     * )
     * 
     */
    public function show(Marca $marca)
    {
        return new MarcaResource($marca);
    }

}
