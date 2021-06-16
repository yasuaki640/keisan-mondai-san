<?php

namespace Tests\Unit\App\Http\User;

use App\Http\Requests\User\StoreRequest;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Framework\TestCase;

class StoreRequestTest extends TestCase
{
    /**
     * @param array
     * @param array
     * @param boolean
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
            'fail no name' => [
                [
                    'd_o_b',
                    'sex',
                    'email',
                    'password',
                    'password_confirmation'
                ],
                [
                    '1994-09-07',
                    0,
                    'y@g.com',
                    'password',
                    'password'
                ],
                false
            ]
        ];
    }
}
