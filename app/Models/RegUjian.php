<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegUjian extends Model
{
    use HasFactory;
    protected $fillable=['jadwal_id',
    'mahasiswa_id',
    'mulai',
    'selesai'];

    public function getMahasiswa()
    {
        return Mahasiswa::find($this->mahasiswa_id);
    }
    public function getJadwal()
    {
        return Jadwal::find($this->jadwal_id);
    }

    public function getNilaiEssay()
    {
        return PeriksaEssay::where('reg_ujian_id',$this->id)->first();
    }
    
}
