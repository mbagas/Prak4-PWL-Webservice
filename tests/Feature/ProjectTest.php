<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\Project;

class ProjectTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_get_all_projects()
    {
        $projects = [
            [
                'name' => 'Project 1',
                'description' => 'Project 1 description',
            ],
            [
                'name' => 'Project 2',
                'description' => 'Project 2 description',
            ],

        ];
        Project::insert($projects);
        $response = $this->getJson('/api/projects');

        $response->assertOk();
    }
}
