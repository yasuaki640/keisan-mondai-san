<?php

namespace Tests\Unit\Requests\QuestionSummary;

use App\Http\Requests\QuestionSummary\StoreRequest;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class StoreRequestTest extends TestCase
{
    /**
     * @param array $keys
     * @param array $values
     * @param bool $expect
     * @dataProvider dataProvider
     */
    public function test_StoreRequest_validation(array $keys, array $values, bool $expect)
    {
        $dataList = array_combine($keys, $values);

        $rules = (new StoreRequest())->rules();

        $validator = Validator::make($dataList, $rules);

        $this->assertEquals($expect, $validator->passes());
    }

    public function dataProvider()
    {
        return [
            'fail invalid operator' => [
                [
                    'operator' ,
                    'num_of_questions'

                ],
                [
                    'aaa',
                    123
                ],
                false
            ],
            'success operator is add' => [
                [
                    'operator' ,
                    'num_of_questions'

                ],
                [
                    'add',
                    123
                ],
                true
            ],
            'success operator is sub' => [
                [
                    'operator' ,
                    'num_of_questions'

                ],
                [
                    'sub',
                    123
                ],
                true
            ],
            'success operator is multi' => [
                [
                    'operator' ,
                    'num_of_questions'

                ],
                [
                    'multi',
                    123
                ],
                true
            ],
            'success operator is divide' => [
                [
                    'operator' ,
                    'num_of_questions'

                ],
                [
                    'divide',
                    123
                ],
                true
            ],
        ];
    }
}
