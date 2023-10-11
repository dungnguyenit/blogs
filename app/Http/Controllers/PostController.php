<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\PostMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\DB as FacadesDB;

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

    public function deletePosts($id)
    {
        $user_id = DB::table('posts')->where('id', $id)->value('user_id');
        if ($user_id == Auth::id()) {
            PostMedia::destroy($id);
            Post::destroy($id);
            return redirect()->back()->with('success', 'Bản ghi đã được xóa thành công.');
        } else {
            return redirect()->back()->with('error', 'Bạn không có quyền xóa bản ghi này.');
        }
    }
    public function editPost($id)
    {
        $posts = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->join('post_media', 'post_media.post_id', '=', 'posts.id')
            ->select('users.name', 'posts.content', 'posts.created_at', 'post_media.media_url', 'post_media.post_id')
            ->where('post_id', '=', $id)
            ->orderBy('posts.created_at', 'desc')
            ->get();
        dd($posts);    
        return view('edit', ['posts' => $posts]);
    }
}
