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

    public function test_create_fail_validation_illegal_d_o_b()
    {
        $response = $this->postJson('api/users', [
            'name' => 'test',
            'd_o_b' => '123123',
            'sex' => 0,
            'email' => 'y@g.com',
            'password' => 'password',
            'password_confirmation'
        ], $this->header);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function test_create_success_validation_empty_email()
    {
        $response = $this->postJson('api/users', [
            'name' => 'test',
            'd_o_b' => '1994-09-07',
            'sex' => 0,
            'email' => '',
            'password' => 'password',
            'password_confirmation' => 'password'
        ], $this->header);

        $response->assertOk();
    }
}
