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
     *                     "mail":"clienteiaw2023@gmail.com",
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
     * @param StorePedidoRequest $request Informacion del detalle pedido a crear.
     * @return PedidoResource
     */
    public function store(StorePedidoRequest $request)
    {
        return new PedidoResource(Pedido::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        return new PedidoWithPrendasResource($pedido);
    }

    /**
     * Display all the resources of a client.
     */
    public function showAll(string $mail_cliente)
    {
        $pedidos = Pedido::where('mail_cliente', $mail_cliente)->get();
        return PedidoResource::collection($pedidos);
    }

}
