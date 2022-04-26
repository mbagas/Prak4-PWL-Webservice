<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $comments = array();
        for ($i = 0; $i < 10; $i++) {
            $comments[] = [
                'name' => 'user ' . $i,
                'comment' => 'comment ' . $i,
                'project_id' => '1',
            ];
        }
        Comment::insert($comments);
    }
}
