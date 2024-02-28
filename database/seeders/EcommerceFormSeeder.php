<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class EcommerceFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ecommerce_form')->insert([
            'portfolio_bef_title' => 'Portfolio',
            'portfolio_title' => 'E-commerce platform development for london based company',
            'portfolio_desc' => 'The makers of AI have announced the company will be dedicating 20% of its compute processing power over the next four years',
            'portfolio_image' => 'img/portfolio/portfolio-details.jpg',
            'project_bef_title' => 'PROJECTS',
            'project_title' => 'Showcase of our recognized work',
            'project_desc' => 'Our collaborative approach ensures that we truly understand our clients unique requirements and challenges.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
