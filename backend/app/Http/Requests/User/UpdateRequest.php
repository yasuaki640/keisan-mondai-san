<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ApiRequest;

class UpdateRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'd_o_b' => ['nullable', 'date_format:Y-m-d', 'before_or_equal:today'],
            'sex' => ['nullable', 'integer', 'min:0', 'max:1'],
            'email' => ['nullable', 'email', 'unique:users'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed']
        ];
    }
}
