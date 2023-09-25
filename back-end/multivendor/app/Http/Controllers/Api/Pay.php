<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\AddressController;
use App\Interfaces\PaymentGatewayInterface;
use App\Http\Controllers\Api\Payment\PayPalPaymentController;
use Illuminate\Support\Facades\App;

class Pay
{

    public function pay(PaymentGatewayInterface $paymentMethod)
    {
        dd($paymentMethod);
        $res = $paymentMethod::handlePayment();
        return $res;
    }
}
