<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teknologi extends Model
{

    protected $table = 'teknologi';
    protected $primaryKey = 'id';
    protected $fillable = ['id','teknologi'];

    public function portofolio()
    {
        return $this->hasMany(Portofolio::class);
    }

    use HasFactory;
}
