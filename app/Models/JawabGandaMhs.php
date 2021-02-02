<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabGandaMhs extends Model
{
    use HasFactory;
    protected $fillable=['reg_ujian_id',
    'soal_ganda_id',
    'jawaban'];

    public function getSoal()
    {
        return SoalPilihanGanda::find($this->soal_ganda_id);
    }
}
