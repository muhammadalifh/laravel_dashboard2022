<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class CreateStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            [
                'status' => 'PENAWARAN',
            ],
            [
                'status' => 'RUNNING',
            ],
            [
                'status' => 'FINISH',
            ],
            ];

            foreach ($status as $key => $value) {
                Status::create($value);
            }
    }
}
