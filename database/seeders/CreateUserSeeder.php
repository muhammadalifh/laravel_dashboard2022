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
                'name' => 'Owner1',
                'email' => 'owner1@user.com',
                'role' => '0',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Owner2',
                'email' => 'owner2@user.com',
                'role' => '0',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Owner3',
                'email' => 'owner3@user.com',
                'role' => '0',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Owner4',
                'email' => 'owner4@user.com',
                'role' => '0',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Owner5',
                'email' => 'owner5@user.com',
                'role' => '0',
                'password' => bcrypt('12345678'),
            ],
            ];

            foreach ($user as $key => $value) {
                User::create($value);
            }
    }
}
