<?php

namespace App\Interfaces;

use App\Http\Requests\Order\StoreRequest;
use Illuminate\Http\Request;

interface PaymentGatewayInterface
{
    public static function handlePayment(StoreRequest $request);
    public function paymentCancel(Request $request);
    public function paymentSuccess(Request $request);
}
