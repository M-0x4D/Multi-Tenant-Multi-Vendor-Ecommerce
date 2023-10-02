<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\StoreRequest;
use App\Http\Requests\Cart\UpdateRequest;
use App\Models\Cart;
use App\Models\Product;
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
        $products = [];
        try {
            //code...
            $cartProducts = ProductCart::where('user_id', auth()->user()->id)->get();
            foreach ($cartProducts as $key => $cartProduct) {
                # code...
                $product = Product::where('id', $cartProduct->product_id)->with('images')->first();
                if (count($product->images) > 0) {
                    # code...
                    $product->image = "http://" . tenant('id') . ".multivendor.test/" . $product->images[0]->name;
                }
                $product->cartQty = $cartProduct->qty ?? 1;
                $products[] = $product;
            }
            return handleResponse([
                'status' => 200,
                'message' => 'cart returned successfully',
                'errors' => null,
                'result' => 'success',
                'data' => $products
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
            $user = auth()->user();

            if ($user->carts()->where('product_id', $request->productId)->exists()) {
                # code...
                return handleResponse([
                    'status' => Response::HTTP_BAD_REQUEST,
                    'message' => 'this product already in cart',
                    'errors' => null,
                    'result' => 'failed',
                    'data' => null
                ]);
            }

            $cart = Cart::updateOrCreate([
                'user_id' => $user->id
            ]);
            // foreach ($request->productIds as $key => $productId) {
            # code...
            ProductCart::updateOrCreate([
                'cart_id' => $cart->id,
                'product_id' => $request->productId,
                'user_id' => $user->id,
                'qty' => $request->qty ?? 1
            ]);
            // }
            return handleResponse([
                'status' => 200,
                'message' => 'products added to cart successfully',
                'errors' => null,
                'result' => 'success',
                'data' => $cart
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ['status' => Response::HTTP_INTERNAL_SERVER_ERROR, 'message' => $th->getMessage(), 'line' => $th->getLine()];
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
        try {
            //code...
            $user = auth()->user();
            ProductCart::where(['user_id' => $user->id, 'product_id' => $request->productId])->update([
                'qty' => $request->qty
            ]);

            return handleResponse([
                'status' => 200,
                'message' => 'product qty updated in cart successfully',
                'errors' => null,
                'result' => 'success',
                'data' =>  $request->all()
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ['status' => Response::HTTP_INTERNAL_SERVER_ERROR, 'message' => $th->getMessage(), 'line' => $th->getLine()];
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $res = ProductCart::where(['user_id' => auth()->user()->id, 'product_id' => $id])->delete();
            return handleResponse([
                'status' => 200,
                'message' => 'product deleted from cart successfully',
                'errors' => null,
                'result' => 'success',
                'data' => $res
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ['status' => Response::HTTP_INTERNAL_SERVER_ERROR, 'message' => $th->getMessage(), 'line' => $th->getLine()];
        }
    }
}
