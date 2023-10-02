<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\StoreRequest;
use App\Http\Requests\Address\UpdateRequest;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $addresses = ShippingAddress::where('user_id' , auth()->user()->id)->with('governrate')->get();
            return handleResponse([
                'status' => 200,
                'message' => 'addresses returned successfully',
                'errors' => null,
                'result' => 'success',
                'data' => $addresses
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
            $address = ShippingAddress::create([
                'user_id' => auth()->user()->id,
                'rememberToken' => 1,
                'phone_number' => $request->phone_number,
                'governrate_id' => $request->governrate_id,
                'city' => $request->city
            ]);

            return handleResponse([
                'status' => 200,
                'message' => 'address created successfully',
                'errors' => null,
                'result' => 'success',
                'data' => $address
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ['status' => Response::HTTP_INTERNAL_SERVER_ERROR ,'message' => $th->getMessage(), 'line' => $th->getLine()];
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(ShippingAddress $address)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, ShippingAddress $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShippingAddress $address)
    {
        //
    }
}
