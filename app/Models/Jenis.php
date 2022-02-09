<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'jenis';
    protected $primaryKey = 'id';
    protected $fillable = ['id','jenis'];

    public function portofolio()
    {
        return $this->hasMany(Portofolio::class);
    }

    use HasFactory;
}
