<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Mail\AllMail;
class MailingApi extends Controller
{
    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function compose()
    {
        $request = $this->request;
        $decode = json_decode(json_encode($request->input()));
        
        $mail = new AllMail($decode->mail);
        $d = $mail->build();
        $d = $this->send($decode->mail->email,$d);
        
    }

    public function send($to,$data)
    {
        try{
            Mail::to($to)->send($data);
            return ["success"=>true];
        }catch(\Exception $e){
            dd($e);
        }
    }
}
