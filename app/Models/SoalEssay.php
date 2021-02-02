<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalEssay extends Model
{
    use HasFactory;
    protected $fillable=['soal',
    'nomor',
    'jadwal_id'];
    public function getJadwal()
    {
        return Jadwal::find($this->jadwal_id);
    }
}
