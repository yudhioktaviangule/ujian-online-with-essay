<?php

namespace App\Http\Controllers\Web\J;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\SoalPilihanGanda;
class SoalGandaCont extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth');
       
    }
    private function validasi($request)
    {
        if(!isset($request->id)){
            return false;
        } 
        $data = Jadwal::where('id',$request->id)->first();
        if($data==NULL):
            return false;
        endif;
        return true;
    }
    public function index(){
        $request  = $this->request;
        $validasi = $this->validasi($request); 
        if(!$validasi):
            return redirect(route('soal.index'))->withErrors(['Data Soal tidak ditemukan']);
        endif;
        $soal = SoalPilihanGanda::where("jadwal_id",$request->id)->get();
        $jadwal = Jadwal::where("id",$request->id)->first();
        return view("pages.soal.ganda.index",compact('soal','jadwal'));

    }
    public function create(){
        $request = $this->request; 
        $validasi = $this->validasi($request); 
        if(!$validasi):
            return redirect(route('soal.index'))->withErrors(['Data Soal tidak ditemukan']);
        endif;
        $jadwal = $request->id;
        return view('pages.soal.ganda.create',compact('jadwal'));
    }
    public function show($id=''){
        $request = $this->request; 
    }
    public function edit($id=''){
        $request = $this->request; 
    }
    public function store(){
        $request = $this->request; 
        $post    = $request->input();
        $n       = SoalPilihanGanda::where('jadwal_id',$request->id)->count()+1;
        $seek    = false;
        
        while(!$seek){
            $nomor   = $n;
            $d = SoalPilihanGanda::where('nomor',$nomor)->where('jadwal_id',$request->id)->first();
            if($d==NULL){
                $seek=true;
            }else{
                $n--;
            }
        }
        unset($post['_token']);
        $post['soal'] = preg_replace('/(<img>)/','<img style="width:100px" src="'.url('/')."/".'soal/'.$post['_filename'].'">',$post['soal']);
        unset($post['_filename']);
        $post['jadwal_id'] = $request->id;
        $post['nomor']     = $n;
        try{
            SoalPilihanGanda::create($post);
            return redirect(route('soalganda.index').'?id='.$post['jadwal_id']);

        }catch(\Exception $e){
            dd($e);
            //return redirect(route('soal.index'))->withErrors(['Kesalahan Inputan']);
        }
    }
    public function update($id=''){
        $request = $this->request; 
    }
    public function destroy($id=''){
        $data = SoalPilihanGanda::where('id',$id)->first();
        $ixd = $data->jadwal_id;
        SoalPilihanGanda::where('id',$id)->delete();
        return redirect(route('soalganda.index').'?id='.$ixd);

    }
}