<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        $data = [
            ['name' => 'Homepage', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Company', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Portfolio', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Services', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'FAQ', 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('page_types')->insert($data);
    }
}
