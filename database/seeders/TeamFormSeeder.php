<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TeamFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team_form')->insert([
            'team_bef_title' => 'Team',
            'team_title' => 'Meet our highly talented team',
            'team_desc' => 'Our team is a vibrant tapestry of backgrounds, expertise, and perspectives. We believe that diversity fuels innovation and creativity',
            'leadership_bef_title' => 'LEADERSHIP',
            'leadership_title' => 'Our Company Leading Members',
            'leadership_desc' => 'Are you busy putting out IT fires instead of focusing on your core business',
            'features_bef_title' => 'FEATURES',
            'features_title' => 'Boosting your business using our team',
            'features_desc' => 'Our team is a melting pot of diverse expertise and skills. From seasoned industry to young talents, member brings a unique set of experiences',
            'our_team_bef_title' => 'OUR TEAM',
            'our_team_title' => 'Our professional experts',
            'our_team_desc' => 'Our team is a collective force of top talents, experts, and visionaries from diverse fields.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
