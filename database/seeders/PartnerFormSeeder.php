<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PartnerFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('partners_form')->insert([
            'partner_bef_title' => 'Partner',
            'partner_title' => 'We have great partners in modern world',
            'partner_desc' => 'Our partners play a pivotal role in our journey, bringing diverse expertise, resources, and shared values to the table.',
            'our_partner_bef_title' => 'WHAT WE’RE OFFERING',
            'our_partner_title' => 'What our partners think about us?',
            'our_partner_sub' => 'We invite you to explore our blog and become part of our journey towards growth.',
            'our_partner_image' => 'img/company/hero-partner-about.jpg',
            'our_partner_desc' => 'Our team is a collective force of top talents, pros, experts, and visionaries from diverse fields. With a passion for excellence, our professionals bring a wealth of experience and knowledge to every project. At Slack, we are committed to delivering nothing short of excellence. From concept to implementation, we maintain the highest standards of quality and craftsmanship, leaving no room for compromise.',
            'partners_trusted_bef_title' => 'PARTNERS',
            'partners_trusted_title' => 'Trusted by our customers & partners',
            'partners_trusted_desc' => 'Our commitment to excellence extends beyond immediate team. We actively seek out partners who share our values, vision and dedication.',
            'partners_trust_title' => 'Why our partners are trust us?',
            'partners_trust_desc_firs' => "We don't believe in a one-size-fit-all approach. Our services are carefully customized to suit your specific need, ensuring you to achieve your goals.",
            'partners_trust_desc_secn' => 'We believe in delivering value that extends your beyond the immediate project. Our services are designed to provide a long-term benefits.',
            'partners_trust_image' => 'partner-trusted.jpg',
            'team_title' => 'Need any further assitance?            ',
            'team_desc' => 'Feel free to reach out for any inquiries or assistance.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
