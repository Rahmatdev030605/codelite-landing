<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AboutUsFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about_us_form')->insert([
            'company_bef_title' => 'Company',
            'company_title' => 'Our company provide a best horizon tech solutions',
            'company_desc' => "Experience the transformative power of innovation and seamless solutions with dynamics. Our journey doesn't end with the delivery of a solution.",
            'our_company_bef_title' => 'OUR COMPANY',
            'our_company_title' => 'Why our company is too popular?',
            'our_company_sub' => 'Contact us today to begin your journey!',
            'our_company_desc' => 'Our team is a collective force of top talents, pros, experts, and visionaries from diverse fields. With a passion for excellence, our professionals bring a wealth of experience and knowledge to every project. At Slack, we are committed to delivering nothing short of excellence. From concept to implementation, we maintain the highest standards of quality and craftsmanship, leaving no room for compromise.',
            'our_company_image' => 'img/company/hero-company-about.jpg',
            'service_bef_title' => 'WHAT WE’RE OFFERING',
            'service_title' => 'Dealing in all professional IT services.',
            'service_desc' => 'One fundamental aspect of IT services is infrastructure management. This involves the design, implementation, and maintenance of the hardware, software, networks, and servers.',
            'our_team_bef_title' => 'OUR TEAM',
            'our_team_title' => 'Our professional experts',
            'our_team_desc' => 'Our team is a collective force of top talents, experts, and visionaries from diverse fields.',
            'our_service_image' => 'img/company/about-service-3.png',
            'our_service_title' => 'Why our services are better than others?',
            'our_service_desc_frs' => "We don't believe in a one-size-fit-all approach. Our services are carefully customized to suit your specific need, ensuring you to achieve your goals.",
            'our_service_desc_sec' => 'We believe in delivering value that extends your beyond the immediate project. Our services are designed to provide a long-term benefits.',
            'team_title' => 'Need any further assitance?',
            'team_desc' => 'Feel free to reach out for any inquiries or assistance.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
