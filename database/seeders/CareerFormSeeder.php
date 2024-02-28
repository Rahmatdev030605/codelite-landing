<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CareerFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('career_form')->insert([
            'career_bef_title' => 'Career',
            'career_title' => 'You have great opportunities',
            'career_desc' => 'If you are a talented and ambitious individual looking to make a mark in your career, we invite you to explore our career opportunities.',
            'our_team_image' => 'img/company/hero-career-about.jpg',
            'our_team_desc' => 'Our team is a collective force of top talents, pros, experts, and visionaries from diverse fields. With a passion for excellence, our professionals bring a wealth of experience and knowledge to every project. At Slack, we are committed to delivering nothing short of excellence. From concept to implementation, we maintain the highest standards of quality and craftsmanship, leaving no room for compromise.',
            'service_bef_title' => 'WHAT WE’RE OFFERING',
            'service_title' => 'Dealing in all professional IT services.',
            'service_desc' => 'One fundamental aspect of IT services is infrastructure management. This involves the design, implementation, and maintenance of the hardware, software, networks, and servers.',
            'job_bef_title' => 'OPENING IN OUR COMPANY',
            'job_title' => 'Job openings and career opportunities',
            'our_services_title' => 'Why our services are better than others?',
            'our_desc_first' => "We don't believe in a one-size-fit-all approach. Our services are carefully customized to suit your specific need, ensuring you to achieve your goals.",
            'our_desc_second' => 'We believe in delivering value that extends your beyond the immediate project. Our services are designed to provide a long-term benefits.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
