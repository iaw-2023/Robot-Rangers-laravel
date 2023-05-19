<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Pedidos\StorePedidoRequest;
use App\Http\Resources\PedidoResource;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends ApiController
{

    /**
     * @OA\Post(
     *     path="/rest/pedidos/",
     *     tags={"Pedidos"},
     *     summary="Crea un pedido.",
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
     *                     type="string",
     *                     example="9999.99",
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
     *         description="UNPROCESSABLE CONTENT",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="La informacion ingresada es invalida.", description="El mensaje de error."),
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
     * Retorna los pedidos de un cliente.
     * En caso de especificar el parametro opcional {id} se retorna el pedido especifico del cliente.
     *
     * @OA\Get(
     *     path="/rest/pedidos/",
     *     tags={"Pedidos"},
     *     @OA\Parameter(
     *         in="query",
     *         name="mail_cliente",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         in="query",
     *         name="id",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="OK",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(
     *                     @OA\Property(
     *                         property="id",
     *                         type="number",
     *                         example="1000"
     *                     ),
     *                     @OA\Property(
     *                         property="created_at",
     *                         type="string",
     *                         example="2023-05-07 20:13:03"
     *                     ),
     *                     @OA\Property(
     *                         property="updated_at",
     *                         type="string",
     *                         example="2023-05-07 20:13:03"
     *                     ),
     *                     @OA\Property(
     *                         property="mail_cliente",
     *                         type="string",
     *                         example="clienteiaw2023@gmail.com"
     *                     ),
     *                     @OA\Property(
     *                         property="monto",
     *                         type="string",
     *                         example="35999.99"
     *                     ),
     *                     @OA\Property(
     *                         property="prendas",
     *                         type="array",
     *                         @OA\Items(
     *                             @OA\Property(
     *                                 property="id",
     *                                 type="number",
     *                                 example="1"
     *                             ),
     *                             @OA\Property(
     *                                 property="nombre",
     *                                 type="string",
     *                                 example="Harden"
     *                             ),
     *                             @OA\Property(
     *                                 property="marca",
     *                                 type="object",
     *                                 @OA\Property(
     *                                     property="id",
     *                                     type="number",
     *                                     example="1"
     *                                 ),
     *                                 @OA\Property(
     *                                     property="nombre",
     *                                     type="string",
     *                                     example="Adidas"
     *                                 )
     *                             ),
     *                             @OA\Property(
     *                                 property="categoria",
     *                                 type="object",
     *                                 @OA\Property(
     *                                     property="id",
     *                                     type="number",
     *                                     example="1"
     *                                 ),
     *                                 @OA\Property(
     *                                     property="nombre",
     *                                     type="string",
     *                                     example="Remeras"
     *                                 )
     *                             ),
     *                             @OA\Property(
     *                                 property="talle",
     *                                 type="string",
     *                                 example="xl"
     *                             ),
     *                             @OA\Property(
     *                                 property="color",
     *                                 type="string",
     *                                 example="#FF0000"
     *                             ),
     *                             @OA\Property(
     *                                 property="imagen",
     *                                 type="string",
     *                                 example="https://d2j6dbq0eux0bg.cloudfront.net/images/62219457/3384172981.jpg"
     *                             ),
     *                             @OA\Property(
     *                                 property="precio",
     *                                 type="string",
     *                                 example="9999.99"
     *                             ),
     *                             @OA\Property(
     *                                 property="descripcion",
     *                                 type="string",
     *                                 example="Edicion limitada 2023"
     *                             ),
     *                             @OA\Property(
     *                                 property="cantidad",
     *                                 type="number",
     *                                 example="4"
     *                             ),
     *                         )
     *                     )
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="NOT FOUND",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Pedidos not found"
     *             )
     *         )
     *     )
     * )
     */
    public function show(Request $request)
    {
        $mail_cliente = $request->input('mail_cliente');
        $id = $request->input('id');

        $pedidos = Pedido::where('mail_cliente', $mail_cliente);

        if ($id) {
            $pedidos->where('id', $id);
        }

        $result = $pedidos->get();

        if ($result->isEmpty()) {
            return response()->json(['message' => 'Pedidos not found'], 404);
        }

        return PedidoResource::collection($result);
    }

}
