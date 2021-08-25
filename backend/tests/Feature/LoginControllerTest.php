<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

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


        $response
            ->assertOk()
            ->assertJsonStructure([
                'access_token',
                'token_type',
                'expires_in'
            ]);
    }

    public function test_scenario_login_success_and_get_login_user_info_from_UserController_me()
    {
        $user = User::factory()->create();

        $token = $this->login($user);

        $this->getLoginUserInfo($token);
    }

    private function login(User $user): string
    {
        $response = $this->postJson('api/login', [
            'name' => $user->name,
            'password' => 'password'
        ]);

        $response
            ->assertOk()
            ->assertJsonStructure([
                'access_toke11555n',
                'token_type',
                'expires_in'
            ]);

        return $response->json('access_token');
    }

    private function getLoginUserInfo(string $token): void
    {
        $response = $this->getJson('api/users/me', [
            'Authorization' => 'Bearer ' . $token
        ]);

        $response->assertOk();
    }
}
