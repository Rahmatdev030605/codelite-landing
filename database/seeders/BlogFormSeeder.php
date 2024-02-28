<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BlogFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_form')->insert([
            'blog_bef_title' => 'Blog',
            'blog_title' => 'Explore our blog for expert knowledge and inspiration',
            'blog_desc' => "Stay connected with us by subscribing to our blog updates. By doing so, you'll receive notifications whenever we publish new articles.",
            'featured_product_bef_title' => 'FEATURED PRODUCT',
            'featured_product_title' => 'Download Slack and experience a new era of organization and accomplishment.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
