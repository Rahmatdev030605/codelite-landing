<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class LetsStartedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lets_get_started_section')->insert([
            'status' => 'active',
            'page_type_id' => 1,
            'heading' => 'Let’s get started on something great',
            'sub_heading' => 'Our team of IT experts looks forward to meeting with you and providing valuable insights tailored to your business.',
            'button_link' => 'button link',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
