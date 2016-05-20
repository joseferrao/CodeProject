<?php

use Illuminate\Database\Seeder;
use VulpeProject\Entities\Projects\ProjectMember;

class ProjectMemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectMember::truncate();
        factory(ProjectMember::class, 20)->create();
    }
}
