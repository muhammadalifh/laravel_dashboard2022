<?php

namespace Database\Seeders;

use App\Models\Jenis;
use Illuminate\Database\Seeder;

class CreateJenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenis = [
            [
                'jenis' => 'IPAL DOMESTIK',
            ],
            [
                'jenis' => 'IPAL INDUSTRI',
            ],
            [
                'jenis' => 'IPAL KLINIK/RS',
            ],
            [
                'jenis' => 'IPAL LABORATORIUM',
            ],
            ];

            foreach ($jenis as $key => $value) {
                Jenis::create($value);
            }
    }
}
