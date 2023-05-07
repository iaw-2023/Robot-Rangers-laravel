<?php

namespace App\Http\Controllers\Api;

use App\Models\DetallePedido;
use App\Http\Requests\DetallePedidos\StoreDetallePedidoRequest;
use App\Http\Resources\DetallePedidoResource;

class DetallePedidoController extends ApiController
{

    /**
     * Registra la información de un detalle pedido.
     *
     * @OA\Post (
     *     path="/rest/detalle_pedidos",
     *     tags={"Detalle Pedidos"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="pedido_id",
     *                          type="number"
     *                      ),
     *                      @OA\Property(
     *                          property="prenda_id",
     *                          type="number"
     *                      ),
     *                      @OA\Property(
     *                          property="cantidad",
     *                          type="number"
     *                      )
     *                 ),
     *                 example={
     *                     "pedido_id":"1",
     *                     "prenda_id":"2",
     *                     "cantidad":"3"
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
     *              @OA\Property(property="pedido_id", type="number", example="1"),
     *              @OA\Property(property="prenda_id", type="number", example="2"),
     *              @OA\Property(property="cantidad", type="number", example="3")
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="UNPROCESSABLE CONTENT",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="The pedido_id field is required."),
     *              @OA\Property(property="errors", type="string", example="Objeto de errores"),
     *          )
     *      )
     * )
     * 
     * @param StoreDetallePedidoRequest $request Informacion del detalle pedido a crear.
     * @return DetallePedidoResource
     */
    public function store(StoreDetallePedidoRequest $request)
    {
        return new DetallePedidoResource(DetallePedido::create($request->validated()));
    }

}
