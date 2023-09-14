<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Resources\FakeResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return FakeResource::collection($users);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {

            DB::beginTransaction();
            $user = User::create([
                'name'=> $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            DB::commit();
            return handleResponse([
                'status' => Response::HTTP_OK,
                'message' => 'user registered successfully',
                'errors' => null,
                'result' => 'success',
                'data' => $user
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
    public function show(User $user)
    {
        return $user;
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
