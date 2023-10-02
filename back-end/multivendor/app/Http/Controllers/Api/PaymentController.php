<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            //code...
            $paymentMethods =  PaymentMethod::get();
            return handleResponse([
                'status' => 200,
                'message' => 'payment methods returned successfully',
                'errors' => null,
                'result' => 'success',
                'data' => $paymentMethods
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            Log::info(['message' => $th->getMessage(), 'line' => $th->getLine(), 'tenant' => tenant('id')]);
            return ['status' => Response::HTTP_INTERNAL_SERVER_ERROR, 'message' => $th->getMessage(), 'line' => $th->getLine()];
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
