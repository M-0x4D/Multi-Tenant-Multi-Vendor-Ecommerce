<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\StoreRequest;
use App\Http\Requests\Cart\UpdateRequest;
use App\Models\Cart;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            //code...
        $cart = Cart::where('user_id' , auth()->user()->id)->with('products')->get();
        return handleResponse([
            'status' => 200,
            'message' => 'cart returned successfully',
            'errors' => null,
            'result' => 'success',
            'data' => $cart
        ]);

        } catch (\Throwable $th) {
            //throw $th;
            Log::info(['message' => $th->getMessage(), 'line' => $th->getLine(), 'tenant' => tenant('id')]);
            return ['status' => Response::HTTP_INTERNAL_SERVER_ERROR, 'message' => $th->getMessage(), 'line' => $th->getLine()];
            // throw new HttpResponseException(handleResponse([]));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            //code...
        $cart = Cart::updateOrCreate([
            'user_id' => auth()->user()->id
        ]);

        foreach ($request->productIds as $key => $productId) {
            # code...
            ProductCart::updateOrCreate([
                'cart_id' => $cart->id,
                'product_id' => $productId
            ]);
        }
        return handleResponse([
            'status' => 200,
            'message' => 'products added to cart successfully',
            'errors' => null,
            'result' => 'success',
            'data' => $cart
        ]);


        } catch (\Throwable $th) {
            DB::rollBack();
            return ['status' => Response::HTTP_INTERNAL_SERVER_ERROR ,'message' => $th->getMessage(), 'line' => $th->getLine()];
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
