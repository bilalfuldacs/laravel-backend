<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_user_allows_expected_mass_assignment(): void
    {
        $user = new User([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'secret',
            'remember_token' => 'ignored-token',
        ]);

        $this->assertSame('Test User', $user->name);
        $this->assertSame('test@example.com', $user->email);
        $this->assertNotSame('secret', $user->password);
        $this->assertTrue(Hash::check('secret', $user->password));
        $this->assertNull($user->remember_token);
    }

    public function test_user_hides_sensitive_fields_when_serialized(): void
    {
        $user = new User([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'secret',
        ]);

        $user->remember_token = 'remember-token';

        $this->assertArrayNotHasKey('password', $user->toArray());
        $this->assertArrayNotHasKey('remember_token', $user->toArray());
    }
}
