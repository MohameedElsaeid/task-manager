<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ApplicationsPagesTest extends TestCase
{
    use DatabaseMigrations;

    public function test_home_page_screen(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_create_tasks_page_screen(): void
    {
        $response = $this->get('/tasks/create');

        $response->assertStatus(200);
    }

    public function test_tasks_page_screen(): void
    {
        $response = $this->get('/tasks');

        $response->assertStatus(200);
    }

    public function test_statistics_page_screen(): void
    {
        $response = $this->get('/statistics');

        $response->assertStatus(200);
    }
}
