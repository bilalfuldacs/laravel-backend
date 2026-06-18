<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class DatabaseIntegrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_migrations_create_required_application_tables(): void
    {
        $this->assertTrue(Schema::hasTable('users'));
        $this->assertTrue(Schema::hasTable('cache'));
        $this->assertTrue(Schema::hasTable('jobs'));
        $this->assertTrue(Schema::hasTable('sessions'));
    }

    public function test_user_factory_persists_a_hashed_password(): void
    {
        $user = User::factory()->create([
            'password' => 'plain-password',
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email' => $user->email,
        ]);

        $this->assertNotSame('plain-password', $user->password);
        $this->assertTrue(Hash::check('plain-password', $user->password));
    }
}
