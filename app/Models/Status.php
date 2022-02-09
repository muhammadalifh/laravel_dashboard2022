<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = "status";
    protected $primaryKey = "id";
    protected $fillable = ['id','status'];

    public function portofolio()
    {
        return $this->hasMany(Portofolio::class);
    }

    use HasFactory;
}
