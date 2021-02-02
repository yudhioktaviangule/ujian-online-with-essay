<?php

namespace App\Http\Controllers\Web\M;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Jadwal;
use App\Models\RegUjian;
use Illuminate\Support\Str;
class CekJadwalMhsCont extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth');
    }
    
    public function index(){
        $request   = $this->request; 
        $user      = Auth::user();
        $mahasiswa = $user->getMahasiswa();
        $kelas_id  = $mahasiswa->kelas_id;
        $tgl       = date('Y-m-d');
        $data    = Jadwal::where("kelas_id",$kelas_id)->where('tanggal',$tgl)->get();
        return view('pages.cek_jadwal_mhs.index',compact('data'));
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
    }
    public function update($id=''){
        $request = $this->request; 
    }
    public function destroy($id=''){
        #code
    }
    public function cekin($mahasiswa,$jadwal)
    {
        $jam    = Jadwal  ::where('id',$jadwal)->first()->waktu*60;
        
        $cek    = RegUjian::where('mahasiswa_id',$mahasiswa)
                    ->where('jadwal_id',$jadwal)
                    ->first();
        if($cek==NULL):
            $data=[
                'mahasiswa_id'  => $mahasiswa,
                'jadwal_id'     => $jadwal,
                'mulai'   => Carbon::now()->format('Y-m-d H:i:s'), 
                'selesai' => Carbon::now()->addSeconds($jam)->format('Y-m-d H:i:s') 
            ];
            $reg = new RegUjian();
            $reg->fill($data);
            $reg->save();
            return redirect(route('ujian.index').'?ujian='.$reg->id);
        else:
            return redirect(route('ujian.index').'?ujian='.$cek->id);
        endif;
        
    }
}