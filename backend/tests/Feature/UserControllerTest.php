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
            'password_confirmation' => 'password',
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
            'password_confirmation' => 'password',
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

    public function test_store_fail_validation_duplicate_name()
    {
        $user = User::factory()->create();

        $response = $this->postJson('api/users', [
            'name' => $user->name,
            'd_o_b' => '1994-09-07',
            'sex' => 0,
            'email' => '',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $response
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJson([
            'errors' => ['name' => ['The name has already been taken.']]
        ]);
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
        $users = User::factory()->count(3)->create();

        $response = $this->actingAs($users->first())
            ->getJson('api/users');

        $response->assertOk();
        $response->assertJson([
            ['id' => $users[0]->id, 'name' => $users[0]->name],
            ['id' => $users[1]->id, 'name' => $users[1]->name],
            ['id' => $users[2]->id, 'name' => $users[2]->name],
        ]);
    }

    public function test_show_fail_not_existing_user()
    {
        $users = User::factory()->count(3)->create();

        $response = $this->actingAs($users->first())
            ->getJson('api/users/' . 999);

        $response->assertNotFound();
    }

    public function test_show_success()
    {
        $users = User::factory()->count(3)->create();

        $response = $this->actingAs($users->first())
            ->getJson('api/users/' . $users[1]->id);

        $response->assertOk();
        $response->assertJson([
            'id' => $users[1]->id,
            'name' => $users[1]->name
        ]);
    }

    public function test_me_success()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->getJson('api/users/me');

        $response->assertOk();
        $response->assertJson([
            'id' => $user->id,
            'name' => $user->name
        ]);
    }

    public function test_update_fail_validation_password_length_under_7()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->putJson('api/users/' . $user->getKey(), [
                'name' => 'yasu',
                'password' => '1234567',
                'password_confirmation' => '1234567'
            ]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJson([
            'errors' => ['password' => ['The password must be at least 8 characters.']]
        ]);
    }

    public function test_update_fail_policy_not_login_user()
    {
        $users = User::factory()->count(2)->create();

        $response = $this->actingAs($users[0])
            ->putJson('api/users/' . $users[1]->getKey(), [
                'name' => 'yasu',
                'd_o_b' => '1994-09-07',
                'sex' => '1',
                'email' => 'yasu@gmail.com',
                'password' => '12345678',
                'password_confirmation' => '12345678'
            ]);

        $response->assertUnauthorized();
    }

    public function test_update_success()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->putJson('api/users/' . $user->getKey(), [
                'name' => 'yasu',
                'd_o_b' => '1994-09-07',
                'sex' => '1',
                'email' => 'yasu@gmail.com',
                'password' => '12345678',
                'password_confirmation' => '12345678'
            ]);

        $response->assertOk();
        $response->assertJson([
            'id' => $user->getKey(),
            'name' => 'yasu',
            'd_o_b' => '1994-09-07',
            'sex' => '1',
            'email' => 'yasu@gmail.com',
        ]);
        $this->assertDatabaseHas('users', [
            'id' => $user->getKey(),
            'name' => 'yasu',
            'd_o_b' => '1994-09-07',
            'sex' => '1',
            'email' => 'yasu@gmail.com',
        ]);
    }

    public function test_destroy_fail_not_logged_in_user()
    {
        $users = User::factory()->count(2)->create();

        $response = $this->actingAs($users[0])
            ->deleteJson('api/users/' . $users[1]->getKey());

        $response->assertUnauthorized();
    }

    public function test_destroy_success()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->deleteJson('api/users/' . $user->getKey());

        $response->assertNoContent();
        $this->assertSoftDeleted('users', ['id' => $user->getKey()]);
    }
}
