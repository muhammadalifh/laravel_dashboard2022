<?php

namespace Database\Seeders;

use App\Models\Portofolio;
use Illuminate\Database\Seeder;

class CreatePortofolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $portofolio = [
            [
                'klien_id' => '1',
                'perusahaan' => 'PT ECOOILS JAYA INDONESIA (GRESIK)',
                'tahun' => '2020',
                'jenis_id' => '1',
                'kapasitas' => '5',
                // 'teknologi_id' => '3',
                'nilai_kontrak' => 'Rp.275.000.000',
                'status_id' => '2',
            ],
            [
                'klien_id' => '1',
                'perusahaan' => 'KLINIK FLORA HOUSE OF BEAUTY ARAYA',
                'tahun' => '2020',
                'jenis_id' => '3',
                'kapasitas' => '3',
                // 'teknologi_id' => '2',
                'nilai_kontrak' => 'Rp.55.000.000',
                'status_id' => '3',
            ],
            [
                'klien_id' => '1',
                'perusahaan' => 'HOTEL GOLDEN TULLIP HOLLAND BATU',
                'tahun' => '2020',
                'jenis_id' => '1',
                'kapasitas' => '200',
                // 'teknologi_id' => '2',
                'nilai_kontrak' => 'Rp.670.000.000',
                'status_id' => '3',
            ],
            [
                'klien_id' => '1',
                'perusahaan' => 'PT ECOOILS JAYA INDONESIA (DUMAI)',
                'tahun' => '2020',
                'jenis_id' => '2',
                'kapasitas' => '50',
                // 'teknologi_id' => '2',
                'nilai_kontrak' => 'Rp.341.825.000',
                'status_id' => '3',
            ],
            [
                'klien_id' => '1',
                'perusahaan' => 'PASAR IKAN ROGOJAMPI',
                'tahun' => '2020',
                'jenis_id' => '1',
                'kapasitas' => '1.5',
                // 'teknologi_id' => '3',
                'nilai_kontrak' => 'Rp.148.643.000',
                'status_id' => '3',
            ],
            [
                'klien_id' => '1',
                'perusahaan' => 'HOLLAND BAKERY KARAWANG',
                'tahun' => '2021',
                'jenis_id' => '2',
                'kapasitas' => '12',
                // 'teknologi_id' => '3',
                'nilai_kontrak' => 'Rp.770.000.000',
                'status_id' => '2',
            ],
            [
                'klien_id' => '1',
                'perusahaan' => 'IPAL DOMESTIK LABUAN BAJO',
                'tahun' => '2021',
                'jenis_id' => '1',
                'kapasitas' => '250',
                // 'teknologi_id' => '2',
                'nilai_kontrak' => 'Rp.1.003.500.000',
                'status_id' => '2',
            ],
            [
                'klien_id' => '1',
                'perusahaan' => 'IPAL DOMESTIK BAMBANGLIPURO BANTUL',
                'tahun' => '2021',
                'jenis_id' => '1',
                'kapasitas' => '3000',
                // 'teknologi_id' => '2',
                'nilai_kontrak' => 'Rp.1.000.000.000',
                'status_id' => '2',
            ],
            [
                'klien_id' => '1',
                'perusahaan' => 'PARAHITA DIPONEGORO',
                'tahun' => '2021',
                'jenis_id' => '3',
                'kapasitas' => '7.5',
                // 'teknologi_id' => '3',
                'nilai_kontrak' => 'Rp.177.100.000',
                'status_id' => '2',
            ],
            [
                'klien_id' => '1',
                'perusahaan' => 'PARAHITA MOJOKERTO',
                'tahun' => '2021',
                'jenis_id' => '3',
                'kapasitas' => '6',
                // 'teknologi_id' => '3',
                'nilai_kontrak' => 'Rp.161.810.000',
                'status_id' => '1',
            ],
            [
                'klien_id' => '1',
                'perusahaan' => 'HOLLAND BAKERY CIKINI',
                'tahun' => '2021',
                'jenis_id' => '2',
                'kapasitas' => '5',
                // 'teknologi_id' => '3',
                'nilai_kontrak' => 'Rp.596.300.000',
                'status_id' => '1',
            ],
            [
                'klien_id' => '1',
                'perusahaan' => 'HOLLAND BAKERY SAMARINDA',
                'tahun' => '2022',
                'jenis_id' => '2',
                'kapasitas' => '12',
                // 'teknologi_id' => '3',
                'nilai_kontrak' => 'Rp.657.536.000',
                'status_id' => '1',
            ],
            [
                'klien_id' => '1',
                'perusahaan' => 'HOLLAND BAKERY SOLO',
                'tahun' => '2022',
                'jenis_id' => '2',
                'kapasitas' => '12',
                // 'teknologi_id' => '3',
                'nilai_kontrak' => 'Rp.513.667.000',
                'status_id' => '1',
            ],
            [
                'klien_id' => '1',
                'perusahaan' => 'KLINIK LIFECARE ENDE',
                'tahun' => '2022',
                'jenis_id' => '3',
                'kapasitas' => '5',
                // 'teknologi_id' => '2',
                'nilai_kontrak' => 'Rp.265.347.500',
                'status_id' => '1',
            ],
            ];

            foreach ($portofolio as $key => $value) {
                Portofolio::create($value);
            }
    }
}
