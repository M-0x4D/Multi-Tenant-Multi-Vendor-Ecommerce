<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\UpdateRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\Const_;
use ReflectionClass;
use ReflectionFunction;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return handleResponse([
                'status' => 200,
                'errors' => null,
                'message' => 'orders returned successfully',
                'result' => 'success',
                'data' => Order::cursor(),
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        // dd($request->productIds[0]['size_id']);


        $totalPrice = 0;
        $products = [];

        try {
            $userId = auth()->user()->id;

            $idsCount = count($request->productIds);
            $products = Product::whereIn('id', $request->productIds)->get();
            $productsCount = count($products);

            if ($productsCount !== $idsCount) throw new \ErrorException('products id is not valid');

            foreach ($products as $key => $product) {
                $totalPrice += $product->price;
            }

            DB::beginTransaction();
            $order = Order::create([
                'order_number' => rand(00000, 99999) . "-" . rand(00000, 99999) . "-" . rand(00000, 99999) . "-" . rand(00000, 99999),
                'order_date_time' => date("Y-m-d H:i:s"),
                'total_price' => $totalPrice,
                'user_id' => $userId,
                'address_id' => $request->address_id,
                'shippment_method_id' => $request->shippment_method_id,
                'payment_method_id' => $request->payment_method_id,
            ]);

            foreach ($products as $key => $product) {
                # code...
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'price_at_this_time' => $product->price,
                    'size_id' => null // $product->sizes()->where('id' , $request->productIds['0']['size_id'])->pluck()
                ]);
            }
            DB::commit();
            return handleResponse([
                'status' => Response::HTTP_OK,
                'message' => 'order created successfully',
                'errors' => null,
                'result' => 'success',
                'data' => $order->where('id', $order->id)->with(['products'])->first()
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info(['message' => $th->getMessage(), 'line' => $th->getLine(), 'tenant' => tenant('id')]);
            return ['status' => Response::HTTP_INTERNAL_SERVER_ERROR, 'message' => $th->getMessage(), 'line' => $th->getLine()];
            // throw new HttpResponseException(handleResponse([]));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
