<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company_contact')->insert([
            'no_telp_company' => '088223303782',
            'email_company' => 'codelite.dev@gmail.com',
            'location_company' => 'Komp. Summarecon, Cluster Crystal Commercial No.8, Cisaranten Kidul, Kec. Gedebage, Kota Bandung, Jawa Barat 40296',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        echo "Contact Seeder: Data seeded successfully.\n";
    }
}
