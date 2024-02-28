<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class MedsosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('media_sosial')->insert([
            'medsos_image' => 'img/medsos/instagram.png',
            'medsos_name' => 'zhr_junjunie23',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        echo "Medsos Seeder: Data seeded successfully.\n";
    }
}
