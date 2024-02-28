<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BussinesConsultingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home_business_consulting')->insert([
            'hero_bef_title' => 'ACCELERATED GROWTH',
            'hero_title' => 'Empowering business with modern rules and insights',
            'hero_desc' => 'Welcome to slack business consulting and solutions, where success is not just a destination.',
            'client_companies' => 'Slack is used by over 60,000+ companies across the world',
            'our_service_bef_title' => 'OUR SERVICES',
            'our_service_title' => 'We provide best services',
            'our_service_desc' => 'Our consulting process begins with a thorough assessment of your current infrastructure, workflows, and pain points.',
            'company_spec_bef_title' => 'SPECIALIZATION',
            'company_spec_title' => 'What should our company do for you',
            'consult_client_bef_title' => 'CONSULTING EXCELLENCE',
            'consult_client_title' => 'Build a solution thatwins you more clients.',
            'news_bef_title' => 'DAILY NEWS',
            'news_title' => 'Read more about daily insights',
            'news_desc' => 'In a fast-paced world where information shapes, our daily news service is your informed about the latest developments',
            'portfolio_bef_title' => 'PORTFOLIO',
            'portfolio_title' => 'Explore more about our business',
            'portfolio_desc' => 'Where we proudly present a collection of our finest accomplishments and success stories. Each project represents a collaborative journey with our clients, dedication, and a commitment to excellence.',
            'our_team_bef_title' => 'OUR TEAM',
            'our_team_title' => 'Our team consists of world class experts',
            'our_team_desc' => "We are proud to introduce you to the talented individuals who make up our consultancy's backbone, each contributing their unique skills and wealth of experience to drive transformative results.",
            'testimonial_bef_title' => 'TESTIMONIAL',
            'testimonial_title' => 'What people think about us',
            'testimonial_desc' => 'Their professionalism and commitment to our success were evident throughout the entire process.',
            'contact_bef_title' => 'CONTACT',
            'contact_title' => 'We have branches all over the world',
            'contact_desc' => "Reach out to us through the contact form below, and a member of our dedicated team will respond promptly. We're here to listen, assist, and collaborate.",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
