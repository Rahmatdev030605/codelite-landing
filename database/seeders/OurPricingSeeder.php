<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class OurPricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('our_pricing_section')->insert([
            'status' => 'active',
            'title' => 'OUR PRICING',
            'heading' => 'Our affordable pricing plans',
            'sub_heading' => 'we believe in transparency as the foundation of trust with our clients.',
            'image' => '',
            'button_link' => 'https://wpriverthemes.com/HTML/synck/pricing.html#',
            'page_type_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('our_pricing_section')->insert([
            'status' => 'active',
            'title' => 'Our Pricing second',
            'heading' => 'Our affordable pricing plans',
            'sub_heading' => 'we believe in transparency as the foundation of trust with our clients.',
            'image' => '',
            'button_link' => 'https://wpriverthemes.com/HTML/synck/pricing.html#',
            'page_type_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('our_pricing_section')->insert([
            'status' => 'not active',
            'title' => 'Our Pricing second',
            'heading' => 'Our affordable pricing plans',
            'sub_heading' => 'we believe in transparency as the foundation of trust with our clients.',
            'image' => '',
            'button_link' => 'https://wpriverthemes.com/HTML/synck/pricing.html#',
            'page_type_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('our_pricing_section')->insert([
            'status' => 'not active',
            'title' => 'OUR PRICING',
            'heading' => 'Our affordable pricing plans',
            'sub_heading' => 'we believe in transparency as the foundation of trust with our clients.',
            'image' => '',
            'button_link' => 'https://wpriverthemes.com/HTML/synck/pricing.html#',
            'page_type_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('our_pricing_section')->insert([
            'status' => 'not active',
            'title' => 'Our Pricing Tree',
            'heading' => 'Our affordable pricing plans',
            'sub_heading' => 'we believe in transparency as the foundation of trust with our clients.',
            'image' => '',
            'button_link' => 'https://wpriverthemes.com/HTML/synck/pricing.html#',
            'page_type_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('our_pricing_section')->insert([
            'status' => 'not active',
            'title' => 'Our Pricing Tree',
            'heading' => 'Our affordable pricing plans',
            'sub_heading' => 'we believe in transparency as the foundation of trust with our clients.',
            'image' => '',
            'button_link' => 'https://wpriverthemes.com/HTML/synck/pricing.html#',
            'page_type_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('our_pricing_section')->insert([
            'status' => 'active',
            'title' => 'OUR PRICING Four',
            'heading' => 'Our affordable pricing plans',
            'sub_heading' => 'we believe in transparency as the foundation of trust with our clients.',
            'image' => '',
            'button_link' => 'https://wpriverthemes.com/HTML/synck/pricing.html#',
            'page_type_id' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('our_pricing_section')->insert([
            'status' => 'active',
            'title' => 'OUR PRICING Four',
            'heading' => 'Our affordable pricing plans',
            'sub_heading' => 'we believe in transparency as the foundation of trust with our clients.',
            'image' => '',
            'button_link' => 'https://wpriverthemes.com/HTML/synck/pricing.html#',
            'page_type_id' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('our_pricing_section')->insert([
            'status' => 'active',
            'title' => 'OUR PRICING',
            'heading' => 'Our affordable pricing plans',
            'sub_heading' => 'we believe in transparency as the foundation of trust with our clients.',
            'image' => '',
            'button_link' => 'https://wpriverthemes.com/HTML/synck/pricing.html#',
            'page_type_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('our_pricing_section')->insert([
            'status' => 'active',
            'title' => 'OUR PRICING',
            'heading' => 'Our affordable pricing plans',
            'sub_heading' => 'we believe in transparency as the foundation of trust with our clients.',
            'image' => '',
            'button_link' => 'https://wpriverthemes.com/HTML/synck/pricing.html#',
            'page_type_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
