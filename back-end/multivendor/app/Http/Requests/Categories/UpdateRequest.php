<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
class UpdateRequest extends FormRequest
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
            'name' => 'required'
        ];
    }

    function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        // Change response attitude if the request done via Ajax requests like API requests
        $errors = (new ValidationException($validator))->errors();
        $message = $validator->errors()->first();
        throw new HttpResponseException(handleResponse([
            'status' => 422,
            'message'=> $message,
            'errors' => $errors,
            'result' => 'failed',
            'data' => null
        ]));
    }
}