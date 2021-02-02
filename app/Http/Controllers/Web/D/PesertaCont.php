<?php

namespace App\Http\Controllers\Web\D;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Jadwal;
use App\Models\RegUjian;
use App\Models\JawabGandaMhs;
use App\Models\JawabEssayMhs;
use App\Models\SoalEssay;
use App\Models\PeriksaEssay AS NilaiEssay;
class PesertaCont extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth');
    }
    
    public function index(){
        $request = $this->request; 
        $valid = $this->validasiJadwal($request);
        if(!$valid):
            return redirect(route('penilaian.index'))->withErrors(['Gagal Memuat data']);
        endif;
        $jadwal = $request->jadwal; 
        $data = RegUjian::where('jadwal_id',$request->jadwal)->get();
        return view('pages.penilaian.peserta_ujian.index',compact('data','jadwal'));
    }
    public function create(){
        $request = $this->request;
        $valid   = $this->validasiJadwal($request);
        if(!$valid):
            return redirect(route('penilaian.index'))->withErrors(['Gagal Memuat data']);
        endif;
        $valid   = $this->validasiRegister($request);
        if(!$valid):
            return redirect(route('penilaian.index'))->withErrors(['Gagal Memuat data']);
        endif;
        $jadwal   =  $request->jadwal;
        $reg_id   =  $request->ujian_reg;
        
        $nganda = $this->nGanda($reg_id);
        $jadwal = Jadwal::find($jadwal);
        $soal_count = SoalEssay::where('jadwal_id',$jadwal->id)->count();
        $regUjian = RegUjian::find($reg_id);
        $data = JawabEssayMhs::where('reg_ujian_id',$reg_id)->get();

        return view('pages.penilaian.peserta_ujian.create',compact('soal_count','nganda','jadwal','regUjian','data'));
    }
    public function nGanda($reg_id)
    {
        $ganda = JawabGandaMhs::where('reg_ujian_id',$reg_id)->get();
        $tf = 0;
        foreach ($ganda as $key => $value) {
            $dganda = $value->getSoal();
            if($dganda->kunci==$value->jawaban){
                $tf++;
            }
        }
        $nganda = $tf/count($ganda)*100;
        return $nganda;
    }
    public function show($id=''){
        $request = $this->request; 
        $jadwal  = Jadwal::where('id',$id)->first();
        $nilai   = RegUjian::where('jadwal_id',$id)->get();
        
        return view('cetak.rekapnilai',compact('jadwal','nilai'));

    }
    public function edit($id=''){
        $request = $this->request; 
    }
    public function store(){
        $request = $this->request; 
        $post = $request->input();
        $nilai = 0;
        foreach ($request->nilai as $key => $value) {
            $nilai +=$value;
        }
        $rg = RegUjian::find($request->reg_ujian_id);
        $jadwal = $rg->jadwal_id;
        $soal_count = SoalEssay::where('jadwal_id',$jadwal)->count();
        $soal_count*=5;
        $nilai = ($nilai/$soal_count)*100;
        $nilai_ganda = $request->nilai_ganda;
        $nilai = ($nilai+$nilai_ganda)/2;
        $data = [
            'nilai' => $nilai,
            'reg_ujian_id' => $request->reg_ujian_id
        ];
        $cek = NilaiEssay::where('reg_ujian_id',$rg->id)->first();
        if($cek==NULL):
            $essay = new NilaiEssay();
            $essay->fill($data);
            $essay->save();
        else:
            $cek->nilai = $nilai;
            $cek->reg_ujian_id = $request->reg_ujian_id;
            $cek->save();
        endif;
        return redirect(route('peserta.index')."?jadwal=$rg->jadwal_id");
        
    }
    public function update($id=''){
        $request = $this->request; 
    }
    public function destroy($id=''){
        #code
    }
    public function validasiJadwal($request)
    {
        $auth = Auth::id();
        if($request->jadwal==NULL):
            return false;
        endif;
        $data = Jadwal::where('id',$request->jadwal)->first();
        if($data==NULL):
            return false;
        endif;
        if($data->dosen_id!=$auth):
            return false;
        endif;
        return true;          
    }

    public function validasiRegister($request)
    {
        if($request->ujian_reg==NULL):
            return false;
        endif;
        $reg_id = $request->ujian_reg;
        $cek = RegUjian::where('id',$reg_id)->where('jadwal_id',$request->jadwal)->first();
        if($cek==NULL):
            return false;
        endif;

        return true;
    }
}
