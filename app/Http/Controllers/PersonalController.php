<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\DB as FacadesDB;

class PersonalController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->join('post_media', 'post_media.post_id', '=', 'posts.id')
            ->select('users.name', 'posts.content', 'posts.created_at', 'post_media.media_url', 'post_media.post_id')
            ->where('users.id', '=', Auth::id())
            ->orderBy('posts.created_at', 'desc')
            ->get();
        return view('personalPage', ['posts' => $posts]);
    }
}
