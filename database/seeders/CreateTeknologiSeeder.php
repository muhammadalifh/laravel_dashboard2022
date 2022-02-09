<?php

namespace Database\Seeders;

use App\Models\Teknologi;
use Illuminate\Database\Seeder;

class CreateTeknologiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teknologi = [
            [
                'teknologi' => 'ANAEROB',
            ],
            [
                'teknologi' => 'AEROB',
            ],
            [
                'teknologi' => 'ANAEROB+AEROB',
            ],
            [
                'teknologi' => 'WETLAND',
            ],
            ];

            foreach ($teknologi as $key => $value) {
                Teknologi::create($value);
            }
    }
}
