<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    // protected $primaryKey = 'id_pegawai';
    protected $fillable = ['nama', 'alamat', 'tgl_lahir', 'no_telp'];
    use HasFactory;
}
