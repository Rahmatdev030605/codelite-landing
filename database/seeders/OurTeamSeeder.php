<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class OurTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('our_team_section')->insert([
            'status' => 'not active',
            'page_type_id' => 1,
            'title' => 'OUR TEAM',
            'heading' => 'Our professional experts',
            'description' => 'Our team is a collective force of top talents, experts, and visionaries from diverse fields.',
            'image' => '',
            'button_link' => 'https://wpriverthemes.com/HTML/synck/contact.html',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('our_team_section')->insert([
            'status' => 'active',
            'page_type_id' => 1,
            'title' => '',
            'heading' => '',
            'description' => 'Our team is a collective force of top talents, pros, experts, and visionaries from diverse fields. With a passion for excellence, our professionals bring a wealth of experience and knowledge to every project. At Slack, we are committed to delivering nothing short of excellence. From concept to implementation, we maintain the highest standards of quality and craftsmanship, leaving no room for compromise.',
            'image' => 'img/ourTeam/our-team.jpg',
            'button_link' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('our_team_section')->insert([
            'status' => 'active',
            'page_type_id' => 1,
            'title' => '',
            'heading' => '',
            'description' => 'Our team is a collective force of top talents, pros, experts, and visionaries from diverse fields. With a passion for excellence, our professionals bring a wealth of experience and knowledge to every project. At Slack, we are committed to delivering nothing short of excellence. From concept to implementation, we maintain the highest standards of quality and craftsmanship, leaving no room for compromise.',
            'image' => 'img/ourTeam/our-team.jpg',
            'button_link' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('our_team_section')->insert([
            'status' => 'active',
            'page_type_id' => 3,
            'title' => '',
            'heading' => '',
            'description' => 'Our team is a collective force of top talents, pros, experts, and visionaries from diverse fields. With a passion for excellence, our professionals bring a wealth of experience and knowledge to every project. At Slack, we are committed to delivering nothing short of excellence. From concept to implementation, we maintain the highest standards of quality and craftsmanship, leaving no room for compromise.',
            'image' => 'img/ourTeam/our-team.jpg',
            'button_link' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('our_team_section')->insert([
            'status' => 'not active',
            'page_type_id' => 4,
            'title' => '',
            'heading' => '',
            'description' => 'Our team is a collective force of top talents, pros, experts, and visionaries from diverse fields. With a passion for excellence, our professionals bring a wealth of experience and knowledge to every project. At Slack, we are committed to delivering nothing short of excellence. From concept to implementation, we maintain the highest standards of quality and craftsmanship, leaving no room for compromise.',
            'image' => 'img/ourTeam/our-team.jpg',
            'button_link' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('our_team_section')->insert([
            'status' => 'active',
            'page_type_id' => 5,
            'title' => '',
            'heading' => '',
            'description' => 'Our team is a collective force of top talents, pros, experts, and visionaries from diverse fields. With a passion for excellence, our professionals bring a wealth of experience and knowledge to every project. At Slack, we are committed to delivering nothing short of excellence. From concept to implementation, we maintain the highest standards of quality and craftsmanship, leaving no room for compromise.',
            'image' => 'img/ourTeam/our-team.jpg',
            'button_link' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
