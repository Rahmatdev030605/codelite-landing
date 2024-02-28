<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class OurServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('our_services_section')->insert([
            'page_type_id' => 1,
            'status' => true,
            'title' => '',
            'heading' => 'Why our services are better than others?',
            'description' => "We don't believe in a one-size-fit-all approach. Our services are carefully customized to suit your specific need, ensuring you to achieve your goals.",
            'description_second' => 'We believe in delivering value that extends your beyond the immediate project. Our services are designed to provide a long-term benefits.',
            'image' => 'img/ourServices/our_services.png',
            'button_link' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('our_services_section')->insert([
            'page_type_id' => 2,
            'status' => true,
            'title' => '',
            'heading' => 'Why our services are better than others?',
            'description' => "We don't believe in a one-size-fit-all approach. Our services are carefully customized to suit your specific need, ensuring you to achieve your goals.",
            'description_second' => 'We believe in delivering value that extends your beyond the immediate project. Our services are designed to provide a long-term benefits.',
            'image' => 'img/ourServices/our_services.png',
            'button_link' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('our_services_section')->insert([
            'page_type_id' => 3,
            'status' => true,
            'title' => '',
            'heading' => 'Why our services are better than others?',
            'description' => "We don't believe in a one-size-fit-all approach. Our services are carefully customized to suit your specific need, ensuring you to achieve your goals.",
            'description_second' => 'We believe in delivering value that extends your beyond the immediate project. Our services are designed to provide a long-term benefits.',
            'image' => 'img/ourServices/our_services.png',
            'button_link' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('our_services_section')->insert([
            'page_type_id' => 4,
            'status' => false,
            'title' => 'rahmat',
            'heading' => 'Why our services are better than others?',
            'description' => "We don't believe in a one-size-fit-all approach. Our services are carefully customized to suit your specific need, ensuring you to achieve your goals.",
            'description_second' => 'We believe in delivering value that extends your beyond the immediate project. Our services are designed to provide a long-term benefits.',
            'image' => 'img/ourServices/our_services.png',
            'button_link' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('our_services_section')->insert([
            'page_type_id' => 2,
            'status' => false,
            'title' => 'rahmat',
            'heading' => 'Why our services are better than others?',
            'description' => "We don't believe in a one-size-fit-all approach. Our services are carefully customized to suit your specific need, ensuring you to achieve your goals.",
            'description_second' => 'We believe in delivering value that extends your beyond the immediate project. Our services are designed to provide a long-term benefits.',
            'image' => 'img/ourServices/our_services.png',
            'button_link' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
