<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Offer\StoreRequest;
use App\Http\Requests\Offer\UpdateRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            //code...
        $offer = Offer::create([
            'product_id' => $request->product_id,
            'percentage' => $request->percentage,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date
        ]);

        return handleResponse([
            'status' => 200,
            'message' => 'category created successfully',
            'errors' => null,
            'result' => 'success',
            'data' => $offer
        ]);

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            Log::info(['message' => $th->getMessage(), 'line' => $th->getLine(), 'tenant' => tenant('id')]);
            return ['status' => Response::HTTP_INTERNAL_SERVER_ERROR, 'message' => $th->getMessage(), 'line' => $th->getLine()];
            // throw new HttpResponseException(handleResponse([]));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        try {
            $offer->delete();
            return handleResponse([
                'status' => 200,
                'message' => 'offer deleted successfully',
                'errors' => null,
                'result' => 'success',
                'data' => $offer
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ['status' => Response::HTTP_INTERNAL_SERVER_ERROR , 'message' => $th->getMessage(), 'line' => $th->getLine()];
        }
    }
}
