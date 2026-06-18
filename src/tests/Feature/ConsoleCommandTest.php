<?php

namespace Tests\Feature;

use Tests\TestCase;

class ConsoleCommandTest extends TestCase
{
    public function test_inspire_command_runs_successfully(): void
    {
        $this->artisan('inspire')
            ->assertSuccessful();
    }
}
