<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    public function test_login_fail_invalid_credentials()
    {
        $response = $this->postJson('api/login', [
            'name' => 'test name',
            'password' => 'password'
        ]);

        $response->assertUnauthorized();
    }
}
