<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriksaEssay extends Model
{
    use HasFactory;
    protected $fillable=['reg_ujian_id',
    'soal_id',
    'nilai'];
}
