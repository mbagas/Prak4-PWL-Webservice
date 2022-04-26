<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Arr;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $projects = array();
        for ($i = 0; $i < 10; $i++) {
            $projects[] = [
                'name' => 'Project ' . $i,
                'description' => 'Project ' . $i . ' description',
                'image' => 'project' . $i . '.jpg',
            ];
        }
        Project::insert($projects);
    }
}
