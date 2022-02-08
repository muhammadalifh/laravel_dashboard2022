<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;

class CreatePegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pegawai = [
            [
                'nama' => 'Peggy G. Morrison',
                'alamat' => '4692 Oak Ridge Drive Bloomsdale, MO 63627',
                'tgl_lahir' => '2022-02-01',
                'no_telp' => '827-01-9612',
            ],
            [
                'nama' => 'Robert R. Powell',
                'alamat' => '699 Edgewood Avenue Fresno, CA 93721',
                'tgl_lahir' => '2022-02-02',
                'no_telp' => '452-87-8712',
            ],

            [
                'nama' => 'Diana G. Ford',
                'alamat' => '2419 Jadewood Farms Dover, NJ 07801',
                'tgl_lahir' => '2022-02-03',
                'no_telp' => '146-06-6715',
            ],
            [
                'nama' => 'Sherry M. Fishburn',
                'alamat' => '4296 Pointe Lane Hollywood, FL 33023',
                'tgl_lahir' => '2022-02-04',
                'no_telp' => '770-24-7615',
            ],
            [
                'nama' => 'Lena W. Hall',
                'alamat' => '4300 Sugar Camp Road New Albin, MN 52160',
                'tgl_lahir' => '2022-02-05',
                'no_telp' => '477-20-3281',
            ],
            [
                'nama' => 'Paula O. Smith',
                'alamat' => '261 Clover Drive Colorado Springs, CO 80903',
                'tgl_lahir' => '2022-02-06',
                'no_telp' => '653-07-1986',
            ],
            [
                'nama' => 'Thomas S. Gooden',
                'alamat' => '4468 Tree Frog Lane Kansas City, MO 64151',
                'tgl_lahir' => '2022-02-01',
                'no_telp' => '500-32-8125',
            ],
            ];

            foreach ($pegawai as $key => $value) {
                Pegawai::create($value);
            }
    }
}
