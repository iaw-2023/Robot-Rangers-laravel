<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Pedidos\StorePedidoRequest;
use App\Http\Resources\PedidoResource;
use App\Http\Resources\PedidoWithPrendasResource;
use App\Models\Pedido;

class PedidoController extends ApiController
{

    /**
     * @OA\Post(
     *     path="/rest/pedidos",
     *     tags={"Pedidos"},
     *     summary="Crear un pedido",
     *     description="Permite crear un pedido con la información del cliente, el monto y las prendas.",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 required={"mail_cliente", "monto", "prendas"},
     *                 @OA\Property(
     *                     property="mail_cliente",
     *                     type="string",
     *                     example="cliente@iaw2023.com",
     *                     description="El correo electrónico del cliente."
     *                 ),
     *                 @OA\Property(
     *                     property="monto",
     *                     type="number",
     *                     example=9999.99,
     *                     description="El monto total del pedido."
     *                 ),
     *                 @OA\Property(
     *                     property="prendas",
     *                     type="array",
     *                     description="Un arreglo de prendas que contiene el id, nombre y cantidad de cada prenda.",
     *                     @OA\Items(
     *                         type="object",
     *                         required={"id", "nombre", "cantidad"},
     *                         @OA\Property(
     *                             property="id",
     *                             type="integer",
     *                             example=1,
     *                             description="El id de la prenda."
     *                         ),
     *                         @OA\Property(
     *                             property="nombre",
     *                             type="string",
     *                             example="Remera Lebron II",
     *                             description="El nombre de la prenda."
     *                         ),
     *                         @OA\Property(
     *                             property="cantidad",
     *                             type="integer",
     *                             example=4,
     *                             description="La cantidad de la prenda."
     *                         )
     *                     )
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="CREATED",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=1, description="El id del pedido."),
     *             @OA\Property(property="created_at", type="string", example="2023-05-07 00:00:00", description="La fecha y hora de creación del pedido."),
     *             @OA\Property(property="updated_at", type="string", example="2023-05-07 00:00:00", description="La fecha y hora de actualización del pedido."),
     *             @OA\Property(property="mail_cliente", type="string", example="cliente@iaw2023.com", description="El correo electrónico del cliente."),
     *             @OA\Property(property="monto", type="number", example=9999.99, description="El monto total del pedido.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="UNPROCESSABLE ENTITY",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The given data was invalid.", description="El mensaje de error."),
     *             @OA\Property(property="errors", type="object", description="Un objeto que contiene los errores de validación.")
     *         )
     *     )
     * )
     */
    public function store(StorePedidoRequest $request)
    {
        $pedido = Pedido::create($request->validated());
        foreach ($request->input('prendas') as $prenda) {
            $pedido->prendas()->attach($prenda['id'], ['cantidad' => $prenda['cantidad']]);
        }

        return new PedidoResource($pedido);
    }

    /**
     * Retorna la información de un pedido especifico con todas sus prendas
     *
     * @OA\Get(
     *     path="/rest/pedidos/{id}",
     *     tags={"Pedidos"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
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
     *               example="Pedido not found {$id}"
     *           )
     *       )
     *    )
     * )
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
     *         name="mail_cliente",
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
     *     ),
     *      @OA\Response(
     *       response=404,
     *       description="Not found",
     *       @OA\JsonContent(
     *           @OA\Property(
     *               property="message",
     *               type="string",
     *               example="Pedidos not found {mail_cliente}"
     *           )
     *       )
     *    )
     * )
     */
    public function showAll(string $mail_cliente)
    {
        $pedidos = Pedido::where('mail_cliente', $mail_cliente)->latest()->get();
        return PedidoResource::collection($pedidos);
    }

}
