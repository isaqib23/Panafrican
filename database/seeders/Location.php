<?php

namespace Database\Seeders;

use App\Entities\Locations;
use Database\Factories\LocationFactory;
use Illuminate\Database\Seeder;

class Location extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Locations::insert([
            "address"       => "823 Zayed The First St - Zone 1E3-01 - Abu Dhabi",
            "city"          => "Abu Dhabi",
            "type"          => "account_branch",
            "latitude"      => "24.4853235",
            "longitude"     => "54.3511572",
            "region_id"     => 1,
            "country_id"    => 1,
            "area_id"       => 1,
        ]);
    }
}
