<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Taager\StoreRequest;
use App\Http\Requests\Taager\UpdateRequest;
use App\Models\Taager;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class TaagerController extends Controller
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
                'message' => 'Taagers returned successfully',
                'result' => 'success',
                'data' => Taager::cursor(),
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
        try {

            DB::beginTransaction();
            $tager = Taager::create([
                'name'=> $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone_number' => $request->phone_number,
            ]);
            DB::commit();
            return handleResponse([
                'status' => Response::HTTP_OK,
                'message' => 'taager registered successfully',
                'errors' => null,
                'result' => 'success',
                'data' => $tager
            ]);

        } catch (\Throwable $th) {
            DB::rollBack();
            return ['message' => $th->getMessage(), 'line' => $th->getLine()];
            // throw new \ErrorException(message:$th->getMessage(), line: $th->getLine());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Taager $tager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Taager $tager)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Taager $tager)
    {

    }
}
