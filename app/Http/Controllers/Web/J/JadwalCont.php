<?php

namespace App\Http\Controllers\Web\J;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\User;
use App\Models\Matakuliah;
use App\Models\Kelas;


class JadwalCont extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth');
    }
    public function index(){
        $request = $this->request; 
        $data    = Jadwal::all();
        
        return view("pages.jadwal.index",compact("data"));
    }
    public function create(){
        $dosen  = User::where('level','dosen')->get();
        $matkul = Matakuliah::all();
        $kelas  = Kelas::all();
        return view('pages.jadwal.create',compact("dosen",'matkul','kelas'));
    }
    public function show($id=''){
        $request = $this->request; 
    }
    public function edit($id=''){
        $request = $this->request; 
    }
    private function CekJadwal($dosen_id,$matkul_id,$kelas_id)
    {
        $data = Jadwal::where('dosen_id',$dosen_id)
                        ->where('matkul_id',$matkul_id)
                        ->where('kelas_id',$kelas_id)
                        ->first();
        return $data==NULL?true:false;
    }
    public function store(){
        $request = $this->request; 
         $data    = $request->only('matkul_id','dosen_id','waktu','tanggal','kelas_id');
         $simpan  = $this->CekJadwal($data['dosen_id'],$data['matkul_id'],$data['kelas_id']);
         
            $jadwal = new Jadwal();
            $jadwal->fill($data);
            $jadwal->save();
            
    
        return redirect(route('jadwal.index'));
    }
    public function update($id=''){
        $request = $this->request; 
    }
    public function destroy($id=''){
        #code
    }
}
