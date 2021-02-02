<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalPilihanGanda extends Model
{
    use HasFactory;
    protected $fillable=['soal',
    'nomor',
    'jadwal_id',
    'soal_a',
    'soal_b',
    'soal_c',
    'soal_d',
    'kunci'];
}
