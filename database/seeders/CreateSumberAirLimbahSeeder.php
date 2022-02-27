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
        $sumber_air_limbah = [
            [
                'sumber_air_limbah' => 'Domestik',
            ],
            [
                'sumber_air_limbah' => 'Medis',
            ],
            [
                'sumber_air_limbah' => 'Industri',
            ],
            ];

            foreach ($sumber_air_limbah as $key => $value) {
                SumberAirLimbah::create($value);
            }
    }
}
