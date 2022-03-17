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

            // [
            //     'name' => 'Marketing',
            //     'email' => 'marketingmpesbya@gmail.com',
            //     'role' => '2',
            //     'password' => bcrypt('12345678'),
            // ],
            // [
            //     'name' => 'Agus Priyo',
            //     'email' => 'aguspriyo@gmail.com',
            //     'role' => '2',
            //     'password' => bcrypt('12345678'),
            // ],
            // [
            //     'name' => 'Cansa',
            //     'email' => 'cansa_2003@yahoo.com',
            //     'role' => '2',
            //     'password' => bcrypt('12345678'),
            // ],

            [
                'name' => 'M Alif',
                'email' => 'muhammadalifhidayatullah123@gmail.com',
                'role' => '1',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Alif',
                'email' => 'muhammad.19065@mhs.unesa.ac.id',
                'role' => '2',
                'password' => bcrypt('12345678'),
            ],
            ];

            foreach ($user as $key => $value) {
                User::create($value);
            }
    }
}
