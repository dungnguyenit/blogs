<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class PersonalController extends Controller
{

    public function index($id = null)
    {
        $userId = $id ? $id : Auth::id();

       
        $userInfo = DB::table('users')->select('*')->where('id', $userId)->first();
        $posts = DB::table('posts')->select('*')->where('user_id', $userId)->get();
        $protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
        foreach ($posts as &$p) {
            $p->medias = DB::table('post_media')->select('*')->where('post_id', $p->id)->get();
            foreach ($p->medias as &$pm) {
                $pm->media_url = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . $pm->media_url;
            }
        }

        return view('personalPage', ['posts' => $posts, 'userInfo' => $userInfo]);
    }
}
