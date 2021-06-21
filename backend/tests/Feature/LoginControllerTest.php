<?php

namespace Tests\Feature;

use App\Models\User;
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

    public function test_login_success()
    {
        $user = User::factory()->create();

        $response = $this->postJson('api/login', [
            'name' => $user->name,
            'password' => 'password'
        ]);

        $response->assertOk();
        $response->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_in'
        ]);
    }
}
