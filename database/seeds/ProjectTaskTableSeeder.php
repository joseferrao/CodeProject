<?php

use Illuminate\Database\Seeder;
use VulpeProject\Entities\Projects\ProjectTask;

class ProjectTaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectTask::truncate();
        factory(ProjectTask::class, 50)->create();
    }
}
