<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Matakuliah;
class MatkulCont extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth');
    }
    public function index(){
        $request = $this->request; 
        $data    = Matakuliah::all();
        return view("pages.matakuliah.index",compact("data"));
    }
    public function create(){
        return view("pages.matakuliah.create");
    }
    public function show($id=''){
        $request = $this->request; 
        $data    = Matakuliah::where("id",$id)->first();
        if($data!=NULL):
            return view("pages.matakuliah.show",compact("data"));
        else:
            return view("nf");
        endif;
    }
    public function edit($id=''){
        
        $request = $this->request; 
        $data    = Matakuliah::where("id",$id)->first();
        
        if($data!=NULL):
            return view("pages.matakuliah.edit",compact("data"));
        else:
            return view("nf");
        endif;
    }
    public function store(){
         $request = $this->request; 
         $data    = $request->only('kode_matkul','nama_matkul','jurusan');
         $mhs     = new Matakuliah();
         $mhs->fill($data);
         $mhs->save();
         return redirect(route('matkul.index'));
    }
    public function update($id=''){
        $request           = $this->request; 
        $data              = Matakuliah::where("id",$id)->first();
        $data->nama_matkul = $request->nama_matkul == NULL?$data->nama_matkul: $request->nama_matkul;
        $data->jurusan     = $request->jurusan == NULL?$data->jurusan : $request->jurusan;
        $data->save();
        return redirect(route('matkul.index'));
    }
    public function destroy($id=''){
        $data = Matakuliah::class;
        $data::where('id',$id)->delete();
        return redirect(route('matkul.index'));
    }
}