<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $fillable=[
        'tanggal',
        'waktu',
        'matkul_id',
        'dosen_id',
        'jenis_ujian',
        'kelas_id'
    ];

    public function getMatakuliah()
    {
        return Matakuliah::where("id",$this->matkul_id)->first();
    }
    public function getKelas()
    {
        return Kelas::where("id",$this->kelas_id)->first();
    }
    public function getDosen()
    {
        return User::where("id",$this->dosen_id)->first();
    }
}
