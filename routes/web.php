<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdxCont;
use App\Http\Controllers\Web\MahasiswaCont;
use App\Http\Controllers\Web\KelasCont;
use App\Http\Controllers\Web\MatkulCont;
use App\Http\Controllers\Web\UserCont;
use App\Http\Controllers\Web\J\JadwalCont;
use App\Http\Controllers\Web\J\SoalCont;
use App\Http\Controllers\Web\J\SoalGandaCont;
use App\Http\Controllers\Web\J\SoalEssayCont;
use App\Http\Controllers\Web\M\CekJadwalMhsCont;
use App\Http\Controllers\Web\M\UjianCont;
use App\Http\Controllers\Web\D\PeriksaNilaiCont;
use App\Http\Controllers\Web\D\PesertaCont;


Route::get('/',[IdxCont::class,'index']);

Auth::routes();

Route::group(['prefix'=>'master'],function(){
    Route::resource("mhs",MahasiswaCont::class);    
    Route::resource("kelas",KelasCont::class);    
    Route::resource("matkul",MatkulCont::class);    
    Route::resource("user",UserCont::class);    
});
Route::group(['prefix'=>'ujian'],function(){
    Route::resource("jadwal",JadwalCont::class);    
    Route::resource("soal",SoalCont::class);    
    Route::resource("periksa",MatkulCont::class);    
    Route::resource("soalganda",SoalGandaCont::class);    
    Route::resource("soalessay",SoalEssayCont::class);    
});

Route::group(['prefix'=>'m'],function(){
    Route::resource("cekjadwalmhs",CekJadwalMhsCont::class);    
    Route::get("regujian/{mahasiswa_id}/{jadwal_id}",[CekJadwalMhsCont::class,'cekin'])->name('checkin');    
    Route::resource('ujian',UjianCont::class);
});
Route::group(['prefix'=>'d'],function(){
    Route::resource("penilaian",PeriksaNilaiCont::class);    
    Route::resource("peserta",PesertaCont::class);    
});


