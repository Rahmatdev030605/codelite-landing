<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CaseStudiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('case_studies_section')->insert([
            'status' => 'active',
            'page_type_id' => 2,
            'title' => 'CASE STUDIES',
            'heading' => 'Detailing of our products',
            'button_link_1' => 'Development',
            'button_link_2' => 'Woo Commerce',
            'button_link_3' => 'CRM Solutions',
            'button_link_4' => 'Web Design',
            'button_link_5' => 'IT Support',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
