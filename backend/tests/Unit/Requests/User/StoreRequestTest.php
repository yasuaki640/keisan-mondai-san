<?php

namespace Tests\Unit\Requests\User;

use App\Http\Requests\User\StoreRequest;
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
            ],
            'fail illegal_d_o_b' => [
                [
                    'name',
                    'd_o_b',
                    'sex',
                    'email',
                    'password',
                    'password_confirmation'
                ],
                [
                    'yasu',
                    '123123',
                    0,
                    'y@g.com',
                    'password',
                    'password'
                ],
                false
            ],
            'fail empty email' => [
                [
                    'name',
                    'd_o_b',
                    'sex',
                    'email',
                    'password',
                    'password_confirmation'
                ],
                [
                    'yasu',
                    '123123',
                    0,
                    '',
                    'password',
                    'password'
                ],
                false
            ],
        ];
    }
}
