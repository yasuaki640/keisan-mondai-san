<?php

namespace Tests\Unit\Models;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_setPasswordAttribute_check_if_password_string_automatically_hashed()
    {
        $user = User::factory()->create();

        $user->password = 'password';
        $user->save();

        $this->assertFalse(Hash::needsRehash($user->password));
    }

    public function test_setPasswordAttribute_check_if_hashed_password_string_inserted_as_is()
    {
        $user = User::factory()->create();

        $user->password = Hash::make('password');
        $user->save();

        $this->assertFalse(Hash::needsRehash($user->password));
    }
}
