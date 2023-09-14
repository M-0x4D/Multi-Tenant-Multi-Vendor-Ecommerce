<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface PaymentGatewayInterface
{
    public function handlePayment();
    public function paymentCancel(Request $request);
    public function paymentSuccess(Request $request);
}
