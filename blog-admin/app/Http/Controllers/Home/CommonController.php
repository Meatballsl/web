<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    public function upload(Request $request)
    {

        $file = $request->file('avatar');

        if(!$file->isValid()){
            return "error";
        }

        $suffix = $file->getClientOriginalExtension();
        $fileName = date("Ymd",time()).rand(100,999);
        $result = $file->move(base_path()."/uploads/",$fileName.".".$suffix);

        if(!$result){
            return "error";
        }

        return "uploads/".$fileName.".".$suffix;


    }
}
