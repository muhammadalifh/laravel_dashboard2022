<?php

namespace Database\Seeders;

use CreateJenisTable;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CreateJenisSeeder::class);
        $this->call(CreateKlienSeeder::class);
        $this->call(CreatePortofolioSeeder::class);
        $this->call(CreateStatusSeeder::class);
        $this->call(CreateTeknologiSeeder::class);
        $this->call(CreateUserSeeder::class);
        $this->call(CreateSumberAirLimbahSeeder::class);
    }
}
