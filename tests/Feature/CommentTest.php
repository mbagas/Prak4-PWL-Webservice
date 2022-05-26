<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\Project;
use App\Models\Comment;

class CommentTest extends TestCase
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

    public function test_get_comment()
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

        $comment = [
            'name' => 'guest',
            'comment' => 'Comment 1 ',
            'project_id' => 1,
        ];
        Comment::insert($comment);
        $response = $this->getJson('/api/comments/1');

        $response->assertOk();
    }

    public function test_create_comment()
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

        $comment = [
            'name' => 'Comment 1',
            'comment' => 'Comment 1 description',
            'project_id' => 1,
        ];
        $response = $this->postJson('/api/comments', $comment);

        $response->assertOk();
    }
}
