<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadApi extends Controller
{
    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    function impFunc()
    {
        $base = base_path();
        $expl = explode('/',$base);
        $c = count($expl)-1;
        
        unset($expl[$c]);
        $path = implode($expl)."/soalFile";
        return $path;
    }
    public function upload()
    {

        $request = $this->request;
        $path = $this->impFunc();
        
        $file       = $request->file("upload");
        $extension  = $file->getClientOriginalExtension();
        $name       = date('dmYhis').".$extension";
        $file->move("soal",$name);
        return response()->json(['fileName'=>$name]);
    }
}
