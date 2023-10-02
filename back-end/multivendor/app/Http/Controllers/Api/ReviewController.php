<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\StoreRequest;
use App\Http\Requests\Review\UpdateRequest;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
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
                'message' => 'categories returned successfully',
                'result' => 'success',
                'data' => Review::cursor(),
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
        // $user = auth()->user();
        $reviewableType = 'App\Models\\'.ucfirst($request->type);
        try {

            DB::beginTransaction();
            $review = Review::create([
                'reviewable_id' => $request->reviewable_id,
                'reviewable_type' => $reviewableType,
                'rate' => $request->rate,
                'comment' => $request->comment ?? null,
                'user_id' => auth()->user()->id,
                'name' => $request->name
            ]);
            DB::commit();
            return handleResponse([
                'status' => Response::HTTP_OK,
                'message' => 'review created successfully',
                'errors' => null,
                'result' => 'success',
                'data' => $review->where('id' , $review->id)->first()
            ]);



        } catch (\Throwable $th) {
            DB::rollBack();
            // throw new HttpResponseException(handleResponse([]));
            return ['message' => $th->getMessage(), 'line' => $th->getLine()];
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
