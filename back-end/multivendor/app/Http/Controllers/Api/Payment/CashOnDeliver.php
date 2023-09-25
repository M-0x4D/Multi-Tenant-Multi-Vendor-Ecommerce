<?php
namespace App\Http\Controllers\Api\Payment;

use App\Interfaces\PaymentGatewayInterface;
use Illuminate\Http\Request;

/**
 * Summary of CashOnDeliver
 */
class CashOnDeliver implements PaymentGatewayInterface
{

    public static function handlePayment()
    {
        return 'cash';
    }
    public function paymentCancel(Request $request)
    {
    }
    public function paymentSuccess(Request $request)
    {
    }
}
