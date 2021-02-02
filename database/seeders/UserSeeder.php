<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ["first_name" => "Super", "last_name" => "Admin", "type" => "superAdmin", "email" => "super@admin.com"],
            ["first_name" => "Super", "last_name" => "User", "type" => "superUser", "email" => "super@user.com"],
            ["first_name" => "Regional", "last_name" => "User", "type" => "regionalUser", "email" => "regional@user.com"],
            ["first_name" => "Area", "last_name" => "User", "type" => "areaUser", "email" => "area@user.com"]
        ];

        foreach ($users as $user) {
            \DB::table('users')->insert([
                'first_name' => $user["first_name"],
                'last_name' => $user["last_name"],
                'email' => $user["email"],
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'user_type' => $user["type"],
                'region_id' => 1,
                'country_id' => 1,
                'area_id' => 1,
                'last_login_date' => now(),
                'device_type' => 'web',
                'device_uuid' => "abc123"
            ]);
        }
    }
}
