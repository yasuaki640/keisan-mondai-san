<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public $header = ['Accept' => 'application/json'];

    public function test_create_fail_validation_no_name()
    {
        $response = $this->postJson('api/users', [
            'd_o_b' => '1994-09-07',
            'sex' => 0,
            'email' => 'y@g.com',
            'password' => 'password',
            'password_confirmation'
        ], $this->header);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
