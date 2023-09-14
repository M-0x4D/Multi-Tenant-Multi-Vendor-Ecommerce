<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Favourite\StoreRequest;
use App\Http\Requests\Favourite\UpdateRequest;
use App\Models\Favourite;
use App\Models\FavouriteUser;
use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $user = auth()->user();
            $favourites = $user->favourites;
            return handleResponse([
                'status' => 200,
                'message' => 'category created successfully',
                'errors' => null,
                'result' => 'success',
                'data' => $favourites
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return ['status' => Response::HTTP_INTERNAL_SERVER_ERROR,'message' => $th->getMessage(), 'line' => $th->getLine()];
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {

            $user = auth()->user();
            $userFavourites = $user->favouriteProducts;

            foreach ($userFavourites as $key => $userFavourite) {
                # code...
                if ($userFavourite->id == $request->product_id) {
                    # code...
                    throw new \ErrorException('this id is already favourite');
                }
            }
        $favourite = Favourite::create();
        FavouriteUser::updateOrCreate([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
            'favourite_id' => $favourite->id
        ]);

        return handleResponse([
            'status' => 200,
            'message' => 'product added to favourites successfully',
            'errors' => null,
            'result' => 'success',
            'data' => $favourite
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
    public function show(Favourite $favourite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Favourite $favourite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            Favourite::where('id' , $id)->delete();
            $product = Product::where('id' , $id)->first();

            FavouriteUser::where([
                'user_id' => auth()->user()->id,
                'product_id' => $product->id
            ])->delete();
            $isFavourite = false;
            return handleResponse([
                'status' => 200,
                'message' => 'product removed from favourites successfully',
                'errors' => null,
                'result' => 'success',
                'data' => [
                    'isFavourite' => $isFavourite
                ]
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ['status' => Response::HTTP_INTERNAL_SERVER_ERROR , 'message' => $th->getMessage(), 'line' => $th->getLine()];
        }
    }
}
