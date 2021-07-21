<?php

namespace App\Http\Requests\Question;

use App\Http\Requests\ApiRequest;

class StoreByQuestionSummaryIdRequest extends ApiRequest
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
            'question_summary_id' => ['required', 'integer', 'exists:question_summaries']
        ];
    }
}
