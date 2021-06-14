<?php

namespace Tests\Unit\App\Http\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginRequestTest extends TestCase
{
    public function test_validation($expected, $data)
    {
        $this->assertEquals($expected, $data);
    }

    protected function validate($data)
    {
        
    }
}
