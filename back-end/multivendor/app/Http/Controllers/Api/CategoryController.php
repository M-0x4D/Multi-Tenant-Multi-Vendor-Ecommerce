<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\StoreRequest;
use App\Http\Requests\Categories\UpdateRequest;
use App\Models\Category;
use Dotenv\Exception\ValidationException;
use ErrorException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Category::get());
        try {

            return handleResponse([
                'status' => 200,
                'errors' => null,
                'message' => 'categories returned successfully',
                'result' => 'success',
                'data' => Category::cursor() ,
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
            $category = Category::create([
                'name' => $request->name
            ]);
            return handleResponse([
                'status' => 200,
                'message' => 'category created successfully',
                'errors' => null,
                'result' => 'success',
                'data' => $category
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ['status' => Response::HTTP_INTERNAL_SERVER_ERROR ,'message' => $th->getMessage(), 'line' => $th->getLine()];
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return handleResponse([
            'status' => 200,
            'message' => 'category created successfully',
            'errors' => null,
            'result' => 'success',
            'data' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Category $category)
    {
        try {
            $category->update([
                'name' => $request->name
            ]);
            return handleResponse([
                'status' => 200,
                'message' => 'category created successfully',
                'errors' => null,
                'result' => 'success',
                'data' => $category
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ['status' => Response::HTTP_INTERNAL_SERVER_ERROR,'message' => $th->getMessage(), 'line' => $th->getLine()];
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return handleResponse([
                'status' => 200,
                'message' => 'category deleted successfully',
                'errors' => null,
                'result' => 'success',
                'data' => $category
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ['status' => Response::HTTP_INTERNAL_SERVER_ERROR , 'message' => $th->getMessage(), 'line' => $th->getLine()];
        }
    }
}
