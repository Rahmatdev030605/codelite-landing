<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ConsultingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('consulting_section')->insert([
            'status' => 'active',
            'title' => 'CONSULTING EXCELLENCE',
            'heading' => 'Best pathway to our clients.',
            'sub_heading' => 'Our consulting process begins with a thorough assessment of your current IT infrastructure, workflows, and pain points.',
            'page_type_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
