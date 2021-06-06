<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_fail_validation_no_name()
    {
        $response = $this->postJson('api/users', [
            'd_o_b' => '1994-09-07',
            'sex' => 0,
            'email' => 'y@g.com',
            'password' => 'password',
            'password_confirmation'
        ]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function test_store_fail_validation_illegal_d_o_b()
    {
        $response = $this->postJson('api/users', [
            'name' => 'test',
            'd_o_b' => '123123',
            'sex' => 0,
            'email' => 'y@g.com',
            'password' => 'password',
            'password_confirmation'
        ]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function test_store_success_validation_empty_email()
    {
        $response = $this->postJson('api/users', [
            'name' => 'test',
            'd_o_b' => '1994-09-07',
            'sex' => 0,
            'email' => '',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $response->assertCreated();
    }

    public function test_store_fail_validation_password_confirm()
    {
        $response = $this->postJson('api/users', [
            'name' => 'test',
            'd_o_b' => '1994-09-07',
            'sex' => 0,
            'email' => '',
            'password' => 'password',
            'password_confirmation' => '12341234'
        ]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function test_store_success()
    {
        $response = $this->postJson('api/users', [
            'name' => 'test',
            'd_o_b' => '1994-09-07',
            'sex' => 0,
            'email' => '',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $response->assertCreated();
        $this->assertDatabaseHas('users', [
            'id' => $response->json('id'),
            'name' => 'test',
            'd_o_b' => '1994-09-07',
            'sex' => 0,
        ]);
    }

    public function test_index_success()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->getJson('api/users');

        $response->assertOk();
    }
}
