<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class FeaturedProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('featured_product_section')->insert([
            'status' => 'active',
            'title' => 'FEATURED PRODUCT',
            'heading' => 'Seamless productivity with our new app',
            'sub_heading' => 'Download Slack and experience a new era of organization and accomplishment.',
            'button_link_1' => '',
            'button_link_2' => '',
            'page_type_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
