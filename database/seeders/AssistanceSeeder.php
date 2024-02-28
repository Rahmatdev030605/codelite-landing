<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AssistanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assistance_section')->insert([
            'status' => 'active',
            'page_type_id' => 1,
            'heading' => 'Need any further assistance?',
            'sub_heading' => 'Feel free to reach out for any inquiries or assistance.',
            'button_link' => 'https://wpriverthemes.com/HTML/synck/contact.html',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('assistance_section')->insert([
            'status' => 'not active',
            'page_type_id' => 2,
            'heading' => 'Need any further assistance?',
            'sub_heading' => 'Feel free to reach out for any inquiries or assistance.',
            'button_link' => 'https://wpriverthemes.com/HTML/synck/contact.html',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('assistance_section')->insert([
            'status' => 'active',
            'page_type_id' => 3,
            'heading' => 'Need any further assistance?',
            'sub_heading' => 'Feel free to reach out for any inquiries or assistance.',
            'button_link' => 'https://wpriverthemes.com/HTML/synck/contact.html',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('assistance_section')->insert([
            'status' => 'not active',
            'page_type_id' => 4,
            'heading' => 'Need any further assistance?',
            'sub_heading' => 'Feel free to reach out for any inquiries or assistance.',
            'button_link' => 'https://wpriverthemes.com/HTML/synck/contact.html',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('assistance_section')->insert([
            'status' => 'active',
            'page_type_id' => 5,
            'heading' => 'Need any further assistance?',
            'sub_heading' => 'Feel free to reach out for any inquiries or assistance.',
            'button_link' => 'https://wpriverthemes.com/HTML/synck/contact.html',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
