<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogincontrollerTest extends TestCase
{
    use RefreshDatabase;

    public function test_example()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/auth', [
            'name'=>$user->name,
        ]);
    }
}
