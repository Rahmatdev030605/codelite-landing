<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ArticleSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_section')->insert([
            'status' => 'active',
            'page_type_id' => 1,
            'title' => 'INTERESTING ARTICLES',
            'heading' => 'Read daily news about startup companies',
            'sub_heading' => "  In today's rapidly evolving world, technology is constantly shaping the way we live and interact. From artificial intelligence and automation to virtual reality, the pace of technological advancements is staggering.",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
