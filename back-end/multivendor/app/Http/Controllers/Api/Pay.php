<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\AddressController;
use App\Interfaces\PaymentGatewayInterface;
use App\Http\Controllers\Api\Payment\PayPalPaymentController;
use App\Http\Requests\Order\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Pay
{

    public function pay(StoreRequest $request,PaymentGatewayInterface $paymentMethod)
    {
        // return $request;
        $res = $paymentMethod::handlePayment($request);
        return $res;
    }
}
