<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategory\StoreRequest;
use App\Http\Requests\SubCategory\UpdateRequest;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            //code...
            $SubCategories = SubCategory::get();
            return handleResponse([
                'status' => 200,
                'message' => 'subcategory returned successfully',
                'errors' => null,
                'result' => 'success',
                'data' => $SubCategories
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ['status' => Response::HTTP_INTERNAL_SERVER_ERROR,'message' => $th->getMessage(), 'line' => $th->getLine()];
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            //code...
            $SubCategory = SubCategory::create([
                'name' => $request->name,
                'category_id' => $request->category_id
            ]);

            return handleResponse([
                'status' => 200,
                'message' => 'sub-category created successfully',
                'errors' => null,
                'result' => 'success',
                'data' => $SubCategory
            ]);

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            Log::info(['message' => $th->getMessage(), 'line' => $th->getLine(), 'tenant' => tenant('id')]);
            return ['status' => Response::HTTP_INTERNAL_SERVER_ERROR, 'message' => $th->getMessage(), 'line' => $th->getLine()];
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
