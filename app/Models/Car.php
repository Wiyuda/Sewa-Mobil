<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['merek', 'model', 'plat', 'jumlah', 'tarif'];

    public function rent()
    {
        $this->hasMany(Rent::class);
    }
}
