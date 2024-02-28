<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ProjectSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects_section')->insert([
            'status' => 'active',
            'page_type_id' => 1,
            'title' => 'PROJECTS',
            'heading' => 'Showcase of our recognized work',
            'sub_heading' => 'Our collaborative approach ensures that we truly understand our clients unique requirements and challenges.',
            'button_link' => 'button',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('projects_section')->insert([
            'status' => 'not active',
            'page_type_id' => 2,
            'title' => 'PROJECTS',
            'heading' => 'Showcase of our recognized work',
            'sub_heading' => 'Our collaborative approach ensures that we truly understand our clients unique requirements and challenges.',
            'button_link' => 'button',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('projects_section')->insert([
            'status' => 'active',
            'page_type_id' => 3,
            'title' => 'PROJECTS',
            'heading' => 'Showcase of our recognized work',
            'sub_heading' => 'Our collaborative approach ensures that we truly understand our clients unique requirements and challenges.',
            'button_link' => 'button',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('projects_section')->insert([
            'status' => 'not active',
            'page_type_id' => 4,
            'title' => 'PROJECTS',
            'heading' => 'Showcase of our recognized work',
            'sub_heading' => 'Our collaborative approach ensures that we truly understand our clients unique requirements and challenges.',
            'button_link' => 'button',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('projects_section')->insert([
            'status' => 'active',
            'page_type_id' => 5,
            'title' => 'PROJECTS',
            'heading' => 'Showcase of our recognized work',
            'sub_heading' => 'Our collaborative approach ensures that we truly understand our clients unique requirements and challenges.',
            'button_link' => 'button',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
