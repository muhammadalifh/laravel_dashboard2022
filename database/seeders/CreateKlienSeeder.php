<?php

namespace Database\Seeders;

use App\Models\Klien;
use Illuminate\Database\Seeder;

class CreateKlienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $klien = [
            [
                'klien' => 'SWASTA',
            ],
            [
                'klien' => 'PEMERINTAH',
            ],
            ];

            foreach ($klien as $key => $value) {
                Klien::create($value);
            }
    }
}
