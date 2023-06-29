<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Pagos\StorePagoRequest;
use MercadoPago\SDK;
use MercadoPago\Payment;
use MercadoPago\Payer;

class PagoController extends ApiController
{
    public function store(StorePagoRequest $request)
    {
        require __DIR__ . '/../../../../vendor/autoload.php';
        SDK::setAccessToken($_ENV['MP_ACCESS_TOKEN']);
        $contents = $request->input();
        $payment = new Payment();
        $payment->transaction_amount = $contents['transaction_amount'];
        $payment->token = $contents['token'];
        $payment->installments = $contents['installments'];
        $payment->payment_method_id = $contents['payment_method_id'];
        $payment->issuer_id = $contents['issuer_id'];
        $payer = new Payer();
        $payer->email = $contents['payer']['email'];
        $payer->identification = array(
            "type" => $contents['payer']['identification']['type'],
            "number" => $contents['payer']['identification']['number']
        );
        $payment->payer = $payer;
        $payment->save();
        $response = array(
            'status' => $payment->status,
            'status_detail' => $payment->status_detail,
            'id' => $payment->id
        );
        return json_encode($response);
    }

}
