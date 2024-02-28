<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('home')->insert([
            'hero_image' => 'img/home/hero_image.png',
            'hero_sub_image' => 'img/home/hero_sub_image.svg',
            'hero_bef_title' => 'EMPOWERMENT',
            'hero_title' => 'Seamless IT for your business, boosting your growth.',
            'hero_desc' => 'We provide the expertise and support to propel your business forward in the digital landscape',
            'our_mdl_bef_title' => 'OUR MODEL',
            'our_mdl_title' => 'How we do',
            'our_mdl_sub_title' => 'Save time and money with our powerful method.',
            'service_bef_title' => 'WHAT WE’RE OFFERING',
            'service_title' => 'Dealing in all professional IT services.',
            'service_desc' => 'One fundamental aspect of IT services is infrastructure management. This involves the design, implementation, and maintenance of the hardware, software, networks, and servers.',
            'product_bef_title' => 'CASE STUDIES',
            'product_title' => 'Detailing of our products',
            'consult_client_bef_title' => 'CONSULTING EXCELLENCE            ',
            'consult_client_title' => 'Best pathway to our clients.',
            'consult_client_desc' => 'Our consulting process begins with a thorough assessment of your current IT infrastructure, workflows, and pain points.',
            'project_bef_title' => 'PROJECTS',
            'project_title' => 'Showcase of our recognized work            ',
            'project_desc' => 'Our collaborative approach ensures that we truly understand our clients unique requirements and challenges.',
            'article_bef_title' => 'INTERESTING ARTICLES            ',
            'article_title' => 'Read daily news about startup companies',
            'article_desc' => "In today's rapidly evolving world, technology is constantly shaping the way we live and interact. From artificial intelligence and automation to virtual reality, the pace of technological advancements is staggering.",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
