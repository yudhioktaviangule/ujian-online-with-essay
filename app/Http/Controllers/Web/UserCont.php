<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\F\RandomPassword;
use Illuminate\Support\Facades\Hash;
class UserCont extends Controller{
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
        $data    = User::all();
        return view("pages.user.index",compact("data",'pesan'));
    }
    public function create(){
        return view("pages.user.create");
    }
    public function show($id=''){
        $request = $this->request; 
        $data    = User::where("id",$id)->first();
        if($data!=NULL):
            return view("pages.user.show",compact("data"));
        else:
            return view("nf");
        endif;
    }
    public function edit($id=''){
        $request = $this->request; 
        $data    = User::where("id",$id)->first();
        
        if($data!=NULL):
            return view("pages.user.edit",compact("data"));
        else:
            return view("nf");
        endif;
    }
    public function store(){
         
         $request = $this->request; 
         $data    = $request->only('name','email','mahasiswa_id','level');
         $pw    = new RandomPassword();
         $pass    = $pw->generate();
         $data['password'] = Hash::make($pass);
         $mhs     = new User();
         $mhs->fill($data);
         $mhs->save();
         return redirect(route('user.index'))->with('success',json_encode(["mail"=>[
            'email' => $mhs->email,
            'pass' => $pass,
        ]]));
    }
    public function update($id=''){
        $request           = $this->request; 
        $data              = User::where("id",$id)->first();
        $data->name = $request->name == NULL?$data->name: $request->name;
        $data->email = $request->email == NULL?$data->email: $request->email;
        $data->save();
        return redirect(route('user.index')); 
    }
    public function destroy($id=''){
        $data = User::class;
        $data::where('id',$id)->delete();
        return redirect(route('user.index'));
    }
}
