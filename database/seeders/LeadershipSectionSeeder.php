<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class LeadershipSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('leadership_section')->insert([
            'status' => 'active',
            'page_type_id' => 1,
            'title' => 'LEADERSHIP',
            'heading' => 'Our Company Leading Members',
            'sub_heading' => 'Are you busy putting out IT fires instead of focusing on your core business',
            'button_link' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('leadership_section')->insert([
            'status' => 'not active',
            'page_type_id' => 2,
            'title' => 'LEADERSHIP',
            'heading' => 'Our Company Leading Members',
            'sub_heading' => 'Are you busy putting out IT fires instead of focusing on your core business',
            'button_link' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('leadership_section')->insert([
            'status' => 'active',
            'page_type_id' => 3,
            'title' => 'LEADERSHIP',
            'heading' => 'Our Company Leading Members',
            'sub_heading' => 'Are you busy putting out IT fires instead of focusing on your core business',
            'button_link' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('leadership_section')->insert([
            'status' => 'not active',
            'page_type_id' => 4,
            'title' => 'LEADERSHIP',
            'heading' => 'Our Company Leading Members',
            'sub_heading' => 'Are you busy putting out IT fires instead of focusing on your core business',
            'button_link' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('leadership_section')->insert([
            'status' => 'active',
            'page_type_id' => 5,
            'title' => 'LEADERSHIP',
            'heading' => 'Our Company Leading Members',
            'sub_heading' => 'Are you busy putting out IT fires instead of focusing on your core business',
            'button_link' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
