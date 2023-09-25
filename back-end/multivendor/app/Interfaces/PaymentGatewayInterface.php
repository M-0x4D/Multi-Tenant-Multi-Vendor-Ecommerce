<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface PaymentGatewayInterface
{
    public static function handlePayment();
    public function paymentCancel(Request $request);
    public function paymentSuccess(Request $request);
}
