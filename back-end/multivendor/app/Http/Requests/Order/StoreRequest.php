<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'address_id' => 'required|integer',
            'shippment_method_id' => 'required|integer',
            'payment_method_id' => 'required|integer',
            'productIds' => 'required|array'
        ];
    }


    function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        // Change response attitude if the request done via Ajax requests like API requests
        $errors = (new ValidationException($validator))->errors();
        $message = $validator->errors()->first();
        throw new HttpResponseException(handleResponse([
            'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
            'message'=> $message,
            'errors' => $errors,
            'result' => 'failed',
            'data' => null
        ]));
    }
}
