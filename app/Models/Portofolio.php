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

    use HasFactory;
}
