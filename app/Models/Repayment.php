<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repayment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'car_id', 'jadwal_pengembalian', 'tgl_pengembalian', 'status'];
}
