<?php
declare(strict_types=1);

namespace App\Http\Requests\QuestionSummary;

use App\Http\Requests\ApiRequest;

class StoreRequest extends ApiRequest
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
            'operator' => ['required', 'string', 'in:add,sub,multi,divide'],
            'num_of_questions' => ['required', 'integer']
        ];
    }
}
