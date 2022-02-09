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
        'kapasitas',
        'nilai_kontrak'
    ];

    public function klien()
    {
        return $this->belongsTo(Klien::class);
    }

    use HasFactory;
}
