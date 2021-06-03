<?php
declare(strict_types=1);

namespace App\Http\Requests\User;

use App\Http\Requests\ApiRequest;

class CreateRequest extends ApiRequest
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
            'd_o_b' => ['required', 'date', 'before_or_equal:today'],
            'sex' => ['required'],
            'email' => ['nullable', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
