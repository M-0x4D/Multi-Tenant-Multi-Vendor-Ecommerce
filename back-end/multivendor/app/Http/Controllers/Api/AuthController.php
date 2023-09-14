<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LogInRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    function logIn(LogInRequest $request)
    {

        try {
            //code...
            $model = 'App\Models\\' . ucfirst($request->model);
            $user = $model::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            }

            $success['token'] =  $user->createToken(tenant('id'))->plainTextToken;

            $success['name'] =  $user->name;



            return handleResponse([
                'status' => 200,
                'errors' => null,
                'message' => 'user logged in successfully',
                'result' => 'success',
                'data' => $success,
            ]);
        } catch (\Throwable $th) {


            return handleResponse([
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'errors' => null,
                'message' => $th->getMessage(),
                'result' => 'failed',
                'data' => null,
            ]);
        }
    }
}
