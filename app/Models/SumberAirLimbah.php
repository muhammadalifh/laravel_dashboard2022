<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberAirLimbah extends Model
{

    protected $table = "sumberairlimbah";
    protected $primaryKey = "id";
    protected $fillable = ["id","sumberairlimbah"];

    public function inquiry()
    {
        return $this->hasMany(Inquiry::class);
    }

    use HasFactory;
}
