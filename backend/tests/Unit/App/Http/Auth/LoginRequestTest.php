<?php

namespace Tests\Unit\App\Http\Auth;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class LoginRequestTest extends TestCase
{
    /**
     * @param array
     * @param array
     * @param boolean
     * @dataProvider dataUserRegistration
     */
    public function test_LoginRequest_validation(array $keys, array $values, bool $expect)
    {
        $dataList = array_combine($keys, $values);

        $rules = (new LoginRequest())->rules();

        $validator = Validator::make($dataList, $rules);

        $this->assertEquals($expect, $validator->passes());
    }

    public function dataUserRegistration()
    {
        return [
            'no name' => [
                ['password'],
                ['pass1234'],
                false
            ],
            'no password' => [
                ['name'],
                ['test'],
                false
            ],
            'success' => [
                ['name', 'password'],
                ['yasu', 'pass1234'],
                true
            ]
        ];
    }
}
