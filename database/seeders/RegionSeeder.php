<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'West Africa'   => [
                'Ghana'     => ['Accra', 'Tarkwa', 'Others'],
                'Nigeria'   => ['Lagos', 'Dangote', 'Others'],
            ],
            'East Africa'   => [
                'Kenya'     => ['Nairobi', 'Central', 'Others'],
                'Tanzania'  => ['Dar Es Salam', 'North', 'South', 'Others']
            ],
            'Uganda'        => [
                'Kampala'   => []
            ]
        ];

        foreach ($data as $key => $val){
            $region = \DB::table('regions')->insertGetId(['name' => $key, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
            foreach ($val as $key1 => $val1){
                $country = \DB::table('countries')->insertGetId(['name' => $key1, 'region_id' => $region, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
                foreach ($val1 as $key2 => $val2){
                    \DB::table('areas')->insertGetId(['name' => $val2, 'country_id' => $country, 'region_id' => $region, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
                }
            }
        }
    }
}
