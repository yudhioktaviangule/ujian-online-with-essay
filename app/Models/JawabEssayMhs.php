<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabEssayMhs extends Model
{
    use HasFactory;
    protected $fillable=['reg_ujian_id',
    'soal_essay_id',
    'jawaban'];
    public function getSoal()
    {
        return SoalEssay::find($this->soal_essay_id);
    }
}
