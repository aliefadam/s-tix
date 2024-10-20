<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'stix@admin.com',
                "password" => bcrypt("123"),
                "role" => "super-admin",
            ],
            [
                'name' => 'Alief Adam',
                'email' => 'aliefadam6@gmail.com',
                "password" => bcrypt("123"),
                "role" => "user",
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
