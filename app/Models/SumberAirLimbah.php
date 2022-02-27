<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberAirLimbah extends Model
{

    protected $table = "sumber_air_limbah";
    protected $primaryKey = "id";
    protected $fillable = ["id","sumber_air_limbah"];

    public function inquiry()
    {
        return $this->hasMany(Inquiry::class);
    }

    use HasFactory;
}
