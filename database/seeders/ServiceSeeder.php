<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('service')->insert([
                'service_image' => 'img/service/service1.svg',
                'service_name' => 'Brainstroming',
                'service_desc' => 'Ideas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('service')->insert([
                'service_image' => 'img/service/service2.svg',
                'service_name' => 'Product',
                'service_desc' => 'Design',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('service')->insert([
                'service_image' => 'img/service/service3.svg',
                'service_name' => 'SEO',
                'service_desc' => 'Optimization',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('service')->insert([
                'service_image' => 'img/service/service4.svg',
                'service_name' => 'Front-End',
                'service_desc' => 'Development',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    }
}

