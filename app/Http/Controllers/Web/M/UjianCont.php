<?php

namespace App\Http\Controllers\Web\M;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegUjian;
use App\Models\SoalPilihanGanda;
use App\Models\SoalEssay;
use App\Models\Jadwal;
use App\Models\JawabGandaMhs;
use App\Models\JawabEssayMhs;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class UjianCont extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth');
    }
    private function validasi($id){
        $reg = RegUjian::where('id',$id)->first();
        if($reg==NULL):
            return false;
        endif;
        if($reg->mahasiswa_id!==Auth::user()->mahasiswa_id):
            return false;
        endif;
        $t = Carbon::now();
        $selesai = Carbon::parse($reg->selesai);
        if($t > $selesai):
            return false;
        endif;
        return true;
    }
    private function validasiSimpan($req)
    {
        if(!$req->reg===NULL):
            return false;
        endif;
        $id = $req->reg;
        
        $cek = RegUjian::where('id',$id)->first();
        if($cek==NULL):
            return false;
        endif;
        $ganda_soal_id = [];
        $esay_soal_id = [];
        foreach ($req->jawaban as $key => $value) {
            if($key==='"ganda"'):
                foreach ($value as $soal_id => $v) {
                    $ganda_soal_id[]=$soal_id;
                    
                }
            else:
                foreach ($value as $soal_id => $v) {
                    
                    $esay_soal_id[]=$soal_id;
                }
            endif;
        }
        
        $cek = JawabGandaMhs::where('reg_ujian_id',$id)
                    ->whereIn('soal_ganda_id',$ganda_soal_id)
                    ->count();
        
        if($cek>0):
            return false;
        endif;
        $cek = JawabEssayMhs::where('reg_ujian_id',$id)
                    ->whereIn('soal_essay_id',$esay_soal_id)
                    ->count();
        
        if($cek>0):
            return false;
        endif;
        return true;

    }
    private function getSelisihDetik($registeredUjian){
        $waktu   = Carbon::parse($registeredUjian->selesai);
        $now     = Carbon::now();
        $selisih = $waktu->diffInSeconds($now);
        return $selisih;
    }
    public function index(){
        $request   = $this->request; 
        $id        = $request->ujian;
        $mahasiswa = Auth::user()->getMahasiswa();
        $validasi  = $this->validasi($id);
        if(!$validasi){
            return redirect(route("cekjadwalmhs.index"))->withErrors(['Gagal Mengikuti Ujian']);
        }
        $reg       = RegUjian        ::where('id',$id)->first();
        $jadwal    = $reg->jadwal_id;
        $selisih   = $this->getSelisihDetik($reg);
        $soalGanda = SoalPilihanGanda::where('jadwal_id',$jadwal)->get();
        $soalEssay = SoalEssay       ::where('jadwal_id',$jadwal)->get();
        $arrGanda  = [];
        $arrEssay  = [];
        foreach ($soalGanda as $key => $value) {
            $arrGanda[]=$value;
        } 
        foreach ($soalEssay as $key => $value) {
            $arrEssay[]=$value;
        } 
        shuffle($arrGanda);
        shuffle($arrEssay);
        $ganda = $arrGanda;
        $essay = $arrEssay;
        $jadwal = Jadwal::find($jadwal);
        $regid = $id;
        return view('pages.ujian.index',compact('ganda','jadwal','essay','regid','selisih'));



    }
    public function create(){
        $request = $this->request; 
    }
    public function show($id=''){
        $request = $this->request; 
    }
    public function edit($id=''){
        $request = $this->request; 
    }

    
    public function store(){
        $request = $this->request; 
        
        
        $input = $request->input();
        $valid = $this->validasiSimpan($request);
        
        $ganda=[];
        $essay=[];
        if($valid):
            foreach ($request->jawaban as $key => $value) {
                
                foreach ($value as $soal_id => $jawaban) {
                    if($key=='"ganda"'):
                        $m=[
                            'reg_ujian_id'  => $request->reg,
                            'jawaban'       => $jawaban,
                            'soal_ganda_id' => $soal_id,
                            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                        ];
                        $ganda[] = $m;
                    else:
                        $m = [
                            'reg_ujian_id'  => $request->reg,
                            'jawaban'       => $jawaban,
                            'soal_essay_id' => $soal_id,
                            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                        ];
                        $essay[] = $m;
                    endif;
                    
                }
            }    
            
            if(count($ganda)>0):
                JawabGandaMhs::insert($ganda);
            endif;
            if(count($essay)>0):
                JawabEssayMhs::insert($essay);
            endif;
        endif;
        return redirect(route('cekjadwalmhs.index'));
    }
    public function update($id=''){
        $request = $this->request; 
    }
    public function destroy($id=''){
        #code
    }
}