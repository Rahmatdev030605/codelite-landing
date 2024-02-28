<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
            public function run()
            {
                DB::table('hero_section')->insert([
                    'page_type_id' => 1,
                    'status' => true,
                    'title' => 'rahmat',
                    'heading' => 'Seamless IT for your business, boosting your growth.',
                    'description' => 'We provide the expertise and support to propel your business forward in the digital landscape.',
                    'image' => 'img/hero/hero-home.png',
                    'sub_image' => 'img/hero/sub_hero_home.svg',
                    'highlight_1' => '+8',
                    'highlight_2' => 'Years',
                    'highlight_3' => 'Experience',
                    'button_link_1' => 'http://127.0.0.1:8001/#',
                    'button_link_2' => 'https://wpriverthemes.com/HTML/synck/contact.html',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
