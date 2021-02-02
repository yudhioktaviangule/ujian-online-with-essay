<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\User;

class MahasiswaCont extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request;
         
        $this->middleware('auth');
    }
    public function index(){
        $request = $this->request; 
        $pesan = false;
        if($request->session()->has('success')):
            $pesan = $request->session()->get('success');
            
        endif;
        $data    = Mahasiswa::all();
        return view("pages.mahasiswa.index",compact("data",'pesan'));
    }
    public function create(){
        $kelas   = Kelas::get();
        $request = $this->request;
        return view('pages.mahasiswa.create',compact("kelas")); 
    }
    public function show($id=''){
        $request = $this->request; 
        $data    = Mahasiswa::where("id",$id)->first();
        if($data!=NULL):
            return view("pages.mahasiswa.show",compact("data"));
        else:
            return view("nf");
        endif;
    }
    public function edit($id=''){
        $request = $this->request; 
        $data    = Mahasiswa::where("id",$id)->first();
        $kelas   = Kelas::all();
        if($data!=NULL):
            return view("pages.mahasiswa.edit",compact("data","kelas"));
        else:
            return view("nf");
        endif;
    }
    public function store(){
         $request = $this->request;
         $data    = $request->only("nim",'nama','kelas_id','email','jurusan');
         $mhs     = new Mahasiswa();
         $mhs->fill($data);
         $mhs->save();
         $pass    = new \App\F\RandomPassword();
         $pass    = $pass->generate();
         $users   = [
             'name'         => $data['nama'],
             'email'        => $data['email'],
             'password'      => Hash::make($pass),
             'level'        => 'mahasiswa',
             'mahasiswa_id' => $mhs->id,
            ];
          
         $user    = new User(); 
         $user->fill($users);
         $user->save(); 
         return redirect(route('mhs.index'))->with('success',json_encode(["mail"=>[
             'email' => $user->email,
             'pass' => $pass,
         ]]));

    }
    public function update($id=''){
        $request        = $this->request; 
        $data           = Mahasiswa::where("id",$id)->first();
        $data->nama     = $request->nama    == NULL?$data->nama : $request->nama;
        $data->email    = $request->email   == NULL?$data->email : $request->email;
        $data->jurusan  = $request->jurusan == NULL?$data->jurusan : $request->jurusan;
        $data->kelas_id = $request->kelas_id == NULL?$data->kelas_id : $request->kelas_id;
        $data->save();
        return redirect(route('mhs.index'));
    }
    public function destroy($id=''){
        $data = Mahasiswa::class;
        $data::where('id',$id)->delete();
        return redirect(route('mhs.index'));
    }
}