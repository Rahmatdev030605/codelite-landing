<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class FaqFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faq_form')->insert([
            'faq_bef_title' => 'FAQ',
            'faq_title' => 'Our expert team give answers to your common questions',
            'faq_desc' => 'Welcome to our FAQs section, where we address the most common questions and queries our clients and visitors often have.',
            'faq_section_bef_title' => 'FAQ SECTION',
            'faq_section_title' => 'Frequently asked questions',
            'our_services_title' => 'Why our services are better than others?',
            'our_services_desc_frs' => "We don't believe in a one-size-fit-all approach. Our services are carefully customized to suit your specific need, ensuring you to achieve your goals.",
            'our_services_desc_sec' => 'We believe in delivering value that extends your beyond the immediate project. Our services are designed to provide a long-term benefits.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
