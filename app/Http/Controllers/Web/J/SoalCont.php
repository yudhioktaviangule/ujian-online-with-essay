<?php

namespace App\Http\Controllers\Web\J;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;
class SoalCont extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth');
    }
    public function index(){
        $request = $this->request; 
        $request = $this->request; 
        $tanggal = date("Y-m-d");
        $data    = Jadwal::where('tanggal','>',$tanggal);
        if(Auth::user()->level=='admin'):
            $data = $data->get();
        else:
            $data = $data->where('dosen_id',Auth::id())->get();
        endif;
        return view("pages.soal.index",compact("data"));
        
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
}
