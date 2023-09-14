<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Size\StoreRequest;
use App\Models\ProductSize;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class SizeController extends Controller
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
        $size = Size::create([
            'size' => $request->size
        ]);

        return handleResponse([
            'status' => 200,
            'message' => 'size created successfully',
            'errors' => null,
            'result' => 'success',
            'data' => $size
        ]);
    } catch (\Throwable $th) {
        DB::rollBack();
        return ['status' => Response::HTTP_INTERNAL_SERVER_ERROR,'message' => $th->getMessage(), 'line' => $th->getLine()];
    }
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
