<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

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

    //$user包括：token。email
    protected function sendEmailConfirmationTo($view,$user,$param,$subject)
    {

        $data = compact('user');
        $from = env('MAIL_USERNAME','hello@example.com');
        $name = env('MAIL_NAME','ukoblog');
        $to = $user->$param;



        Mail::send($view, $data, function ($message) use ($from, $name, $to, $subject) {
            $message->from($from, $name)->to($to)->subject($subject);
        });
    }
}
