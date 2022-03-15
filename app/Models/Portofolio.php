<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $table = "portofolio";
    protected $primaryKey = "id";
    protected $fillable = [
        'klien_id',
        'perusahaan',
        'tahun',
        'jenis_id',
        'kapasitas',
        'teknologi_id',
        'nilai_kontrak',
        'status_id',
        'gallery',
        'inquiry_id',
        'penawaran',
        'spk_po_wo',
        'berita_acara_instal',
        'berita_acara_comisioning',
        'berita_acara_sampling',
        'laporan_hasil_uji',
        'berita_acara_kerja_tambah',
        'berita_acara_serah_terima',
        'gambar_desain',
        'gambar_asbuilt',
        'sop',
        'dokumentasi',

    ];

    public function klien()
    {
        return $this->belongsTo(Klien::class);
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    public function teknologi()
    {
        return $this->belongsTo(Teknologi::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class);
    }

    use HasFactory;
}
