<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Pedidos\StorePedidoRequest;
use App\Http\Resources\PedidoResource;
use App\Http\Resources\PedidoWithPrendasResource;
use App\Models\Pedido;

class PedidoController extends ApiController
{

    /**
     * Registra la información de un pedido.
     *
     * @OA\Post (
     *     path="/rest/pedidos",
     *     tags={"Pedidos"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="mail_cliente",
     *                          type="number"
     *                      ),
     *                      @OA\Property(
     *                          property="monto",
     *                          type="number"
     *                      )
     *                 ),
     *                 example={
     *                     "mail_cliente":"clienteiaw2023@gmail.com",
     *                     "monto":"9999999999.99"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="CREATED",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="created_at", type="string", example="2023-05-07 00:00:00"),
     *              @OA\Property(property="updated_at", type="string", example="2023-05-07 00:00:00"),
     *              @OA\Property(property="mail_cliente", type="string", example="clienteiaw2023@gmail.com"),
     *              @OA\Property(property="monto", type="number", example="9999999999.99")
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="UNPROCESSABLE CONTENT",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="The mail_cliente field is required."),
     *              @OA\Property(property="errors", type="string", example="Objeto de errores"),
     *          )
     *      )
     * )
     * 
     * @param StorePedidoRequest $request Informacion del pedido a crear.
     * @return PedidoResource
     */
    public function store(StorePedidoRequest $request)
    {
        return new PedidoResource(Pedido::create($request->validated()));
    }

    /**
     * Retorna la información de un pedido especifico con todas sus prendas
     *
     * @OA\Get(
     *     path="/rest/pedidos/{pedido}",
     *     tags={"Pedidos"},
     *     @OA\Response(
     *         response="200",
     *         description="OK",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 @OA\Property(
     *                     property="id",
     *                     type="number",
     *                     example="1000"
     *                 ),
     *                 @OA\Property(
     *                     property="created_at",
     *                     type="string",
     *                     example="2023-05-07 20:13:03"
     *                 ),
     *                 @OA\Property(
     *                     property="updated_at",
     *                     type="string",
     *                     example="2023-05-07 20:13:03"
     *                 ),
     *                 @OA\Property(
     *                     property="mail_cliente",
     *                     type="string",
     *                     example="clienteiaw2023@gmail.com"
     *                 ),
     *                 @OA\Property(
     *                     property="monto",
     *                     type="string",
     *                     example="35999.99"
     *                 ),
     *                 @OA\Property(
     *                     property="prendas",
     *                     type="array",
     *                     @OA\Items(
     *                         @OA\Property(
     *                             property="id",
     *                             type="number",
     *                             example="1"
     *                         ),
     *                         @OA\Property(
     *                             property="nombre",
     *                             type="string",
     *                             example="Harden"
     *                         ),
     *                         @OA\Property(
     *                             property="cantidad",
     *                             type="number",
     *                             example="4"
     *                         )
     *                     )
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *       response=404,
     *       description="Not found",
     *       @OA\JsonContent(
     *           @OA\Property(
     *               property="message",
     *               type="string",
     *               example="Pedido not found"
     *           )
     *       )
     *    )
     * )
     * 
     * @param Pedido $request Pedido a mostrar
     * @return PedidoWithPrendasResource
     */
    public function show(Pedido $pedido)
    {
        return new PedidoWithPrendasResource($pedido);
    }

    /**
     * Obtiene una lista con todos los pedidos de un cliente
     *
     * @OA\Get(
     *     path="/rest/pedidos/clientes/{mail_cliente}",
     *     tags={"Pedidos"},
     *     @OA\Parameter(
     *         name="cliente",
     *         in="path",
     *         description="Mail del cliente a buscar",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 @OA\Property(property="id", type="number", example=1),
     *                 @OA\Property(property="created_at", type="string", example="2023-05-07 00:00:00"),
     *                 @OA\Property(property="updated_at", type="string", example="2023-05-07 00:00:00"),
     *                 @OA\Property(property="mail_cliente", type="string", example="clienteiaw2023@gmail.com"),
     *                 @OA\Property(property="monto", type="number", example="9999999999.99")
     *             )
     *         )
     *     )
     * )
     *
     * @param string $mail_cliente Mail del cliente a buscar
     * @return PedidoResource:collection()
     */
    public function showAll(string $mail_cliente)
    {
        $pedidos = Pedido::where('mail_cliente', $mail_cliente)->get();
        return PedidoResource::collection($pedidos);
    }

}
