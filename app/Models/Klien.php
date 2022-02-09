<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klien extends Model
{
    protected $table = 'klien';
    protected $primaryKey = 'id';
    protected $fillable = ['id','klien'];


    public function portofolio()
    {
        return $this->hasMany(Portofolio::class);
    }

    use HasFactory;
}
