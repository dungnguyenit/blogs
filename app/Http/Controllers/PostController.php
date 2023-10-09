<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\PostMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store(Request $request, Post $post, PostMedia $postMedia)
    {
        $userId = Auth::id();
        $params = $request->all();
        $post = new Post();
        $post->content = $params['title'];
        $post->user_id = $userId;
        $post->save();
        $postMedia = new PostMedia();
        $postMedia->media_url = $params['file'];
        $postMedia->media_type = config('app.constants.media_types.image');
        $postMedia->post_id = $post->id;
        $postMedia->save();
        return redirect()->route('home');
    }
}
