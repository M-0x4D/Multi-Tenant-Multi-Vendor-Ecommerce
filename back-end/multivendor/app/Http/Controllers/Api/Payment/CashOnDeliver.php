<?php
namespace App\Http\Controllers\Api\Payment;

use App\Http\Controllers\Api\OrderController;
use App\Http\Requests\Order\StoreRequest;
use App\Interfaces\PaymentGatewayInterface;
use Illuminate\Http\Request;

/**
 * Summary of CashOnDeliver
 */
class CashOnDeliver implements PaymentGatewayInterface
{

    public static function handlePayment(StoreRequest $request)
    {
        $res = OrderController::store($request);
        return $res;
    }
    public function paymentCancel(Request $request)
    {
    }
    public function paymentSuccess(Request $request)
    {
    }
}
