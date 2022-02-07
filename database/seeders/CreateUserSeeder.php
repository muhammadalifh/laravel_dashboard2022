<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'role' => '1',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Super Admin',
                'email' => 'super@admin.com',
                'role' => '2',
                'password' => bcrypt('12345678'),
            ],

            [
                'name' => 'User',
                'email' => 'user@user.com',
                'role' => '0',
                'password' => bcrypt('12345678'),
            ]
            ];

            foreach ($user as $key => $value) {
                User::create($value);
            }
    }
}
