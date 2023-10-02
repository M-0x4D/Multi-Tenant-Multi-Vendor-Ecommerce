<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CalcsController extends Controller
{
    static function calculateTotalPrice()
    {
        $shippingPrice = self::calculateShippingPrice();
        $subPrice = self::calculateSubPrice();
        return $shippingPrice + $subPrice;
    }

    static function calculateSubPrice()
    {
        $user = auth()->user();
        $price =0;
        try {
            //code...
            $cartProducts = ProductCart::where('user_id' , $user->id)->get();
            foreach ($cartProducts as $key => $cartProduct) {
                # code...
                $product = Product::find($cartProduct->product_id);
                    # code...
                    $price += +$product->price * $cartProduct->qty ;
            }
            return $price;
        } catch (\Throwable $th) {
            //throw $th;
            return ['status' => Response::HTTP_INTERNAL_SERVER_ERROR, 'message' => $th->getMessage(), 'line' => $th->getLine()];
        }
    }

    static function calculateShippingPrice()
    {
        return 40;
    }
}
