<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{

    protected $table = "inquiry";
    protected $primaryKey = "id";
    protected $fillable = [
        'inquiry_perusahaan',
        'inquiry_alamat',
        'inquiry_nama',
        'inquiry_no_telp',
        'inquiry_email',
        'inquiry_jenis_kegiatan',
        'inquiry_lokasi_kegiatan',
        'inquiry_sumber_air_limbah_id',
        'inquiry_debit_air_limbah',
        'inquiry_luas_lahan_rencana',
        'inquiry_penggunaan_air_bersih',
        'inquiry_jumlah_karyawan',
        'inquiry_jumlah_tamu',
        'inquiry_upload_data',
        'inquiry_keterangan_tambahan',
    ];

    // public function sumberairlimbah()
    // {
    //     return $this->belongsTo(SumberAirLimbah::class);
    // }

    public function portofolio()
    {
        return $this->hasMany(Portofolio::class);
    }


    use HasFactory;
}
