<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\Users;

class CommonController extends Controller
{
    public function upload(Request $request)
    {

        $file = $request->file('avatar');

        if (!$file->isValid()) {
            return "error";
        }

        $suffix = $file->getClientOriginalExtension();
        $fileName = date("Ymd", time()) . rand(100, 999);
        $result = $file->move(base_path() . "/uploads/", $fileName . "." . $suffix);

        if (!$result) {
            return "error";
        }

        return "uploads/" . $fileName . "." . $suffix;


    }

    //$user包括：token。email
    protected function sendEmailConfirmationTo($view, $user, $param, $subject)
    {

        $data = compact('user');
        $from = env('MAIL_USERNAME', 'm18059228991@163.com');
        $name = env('MAIL_NAME', 'ukoblog');
        $to = $user->$param;


        Mail::send($view, $data, function ($message) use ($from, $name, $to, $subject) {
            $message->from($from, $name)->to($to)->subject($subject);
        });
    }

    //推荐文章
    public function recomment()
    {
        $userId = session('user')->id;

        $user = Users::find($userId);

        $article = $user->article->first();

        $recommentArt = null;

        if ($article) {

            foreach ($user->article as $key => $val) {

                $otherUser = $val->user->where('id', '!=', $userId)->first();

                if (!$otherUser) break;

                $art = $otherUser->article->where('id', '!=', $val->id)->where('cid', '=', $val->cid)->first();

                if (!$art) break;

                $recommentArt[$key] = $art->toArray();
            }
        }

        return $recommentArt;
    }
}
