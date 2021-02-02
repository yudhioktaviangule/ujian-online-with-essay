<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable=[
        'nim',
        'nama',
        'email',
        'jurusan',
        'kelas_id',
        'user_id',
    ];
    public function getKelas()
    {
        return Kelas::where("id",$this->kelas_id)->first();
    }
}
