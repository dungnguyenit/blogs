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
        if ($params['title'] == null) {
            return redirect()->route('home')->with('error', 'Content cannot be empty.');
        }
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
            // $postId = $id;
            try {
                PostMedia::where('post_id', $id)->delete();
                Post::destroy($id);
                return redirect()->route('home')->with('success', 'Bài đăng đã được xoá thành công.');
            } catch (\Exception $e) {
                return redirect()->route('home')->with('error', 'Đã xảy ra lỗi khi xoá bài đăng.');
            }
        }
        else{
            return redirect()->route('home')->with('error','Bạn không có quyền xoá');
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
        return view('edit', ['posts' => $posts]);
    }

    public function updatePost(Request $request, $id)
    {
        $user_id = DB::table('posts')->where('id', $id)->value('user_id');
        if ($user_id == Auth::id()) {
            $post = Post::findOrFail($id);
            $post->content = $request->input('title');
            $post->save();

            if ($request->hasFile('file')) {
                // Xóa media cũ nếu có
                if ($post->postMedia) {
                    $postMedia = $post->postMedia;
                    $file = $request->file('file');
                    $path = $file->store('images');
                    $postMedia->media_url = $path;
                    $postMedia->save();
                }
            }
            return redirect()->route('home');
        } else {
            return redirect()->route('home');
        }
    }
}
