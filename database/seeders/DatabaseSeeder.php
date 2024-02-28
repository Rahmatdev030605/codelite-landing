<?php

namespace Database\Seeders;

use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder.
 */
class DatabaseSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        Model::unguard();

        $this->truncateMultiple([
            'activity_log',
            'failed_jobs',
        ]);

        // $this->call(AuthSeeder::class);=
        // $this->call(AnnouncementSeeder::class);=
        $this->call(ServiceSeeder::class);
        $this->call(PartnerSeeder::class);
        // $this->call(PartnerListSeeder::class);=
        $this->call(HeroSeeder::class);
        $this->call(OurServicesSeeder::class);
        $this->call(OurTeamSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(WhatOfferingSeeder::class);
        $this->call(OurCompanySeeder::class);
        $this->call(LeadershipSectionSeeder::class);
        $this->call(AssistanceSeeder::class);
        $this->call(OurTrueWordSeeder::class);
        $this->call(ProductSeeder::class);
        // $this->call(ProductCategoriesSeeder::class);=
        // $this->call(ContactSeeder::class);=
        // $this->call(MedsosSeeder::class);=
        $this->call(ProjectSectionSeeder::class);
        // $this->call(PageTypeSeeder::class);=
        $this->call(OurPricingSeeder::class);

        Model::reguard();
    }
}
