<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class OurModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('our_model_section')->insert([
            'status' => 'active',
            'title' => 'OUR MODEL',
            'heading' => 'HOW WE DO',
            'sub_heading' => 'Save time and money with our powerful method.',
            'button_link' => 'Learn More',
            'page_type_id' => 1,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);
    }
}
