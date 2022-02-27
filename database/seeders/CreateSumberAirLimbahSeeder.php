<?php

namespace Database\Seeders;

use App\Models\SumberAirLimbah;
use Illuminate\Database\Seeder;

class CreateSumberAirLimbahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sumberairlimbah = [
            [
                'sumberairlimbah' => 'Domestik',
            ],
            [
                'sumberairlimbah' => 'Medis',
            ],
            [
                'sumberairlimbah' => 'Industri',
            ],
            ];

            foreach ($sumberairlimbah as $key => $value) {
                SumberAirLimbah::create($value);
            }
    }
}
