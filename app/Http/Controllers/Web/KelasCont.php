<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Kelas;

class KelasCont extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth');
    }
    public function index(){
        $request = $this->request; 
        $data    = Kelas::all();
        return view("pages.kelas.index",compact("data"));

    }
    public function create(){
        return view("pages.kelas.create");
    }
    public function show($id=''){
        $request = $this->request; 
        $data    = Kelas::where("id",$id)->first();
        if($data!=NULL):
            return view("pages.kelas.show",compact("data"));
        else:
            return view("nf");
        endif;
    }
    public function edit($id=''){
        $request = $this->request; 
        $data    = Kelas::where("id",$id)->first();
       
        if($data!=NULL):
            return view("pages.kelas.edit",compact("data"));
        else:
            return view("nf");
        endif;
    }
    public function store(){
         $request = $this->request; 
         $data    = $request->only('kode_kelas','jurusan');
         $mhs     = new Kelas();
         $mhs->fill($data);
         $mhs->save();
         return redirect(route('kelas.index'));
        
    }
    public function update($id=''){
        $request          = $this->request; 
        $data             = Kelas::where("id",$id)->first();
        $data->kode_kelas = $request->kode_kelas == NULL?$data->kode_kelas : $request->kode_kelas;
        $data->jurusan    = $request->jurusan == NULL?$data->jurusan : $request->jurusan;
        $data->save();
        return redirect(route('kelas.index')); 
    }
    public function destroy($id=''){
        $data = Kelas::class;
        $data::where('id',$id)->delete();
        return redirect(route('kelas.index'));
    }
}