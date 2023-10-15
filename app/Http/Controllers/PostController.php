<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\PostMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

        // Lưu bài viết
        $post = new Post();
        $post->content = $params['title'];
        $post->user_id = $userId;
        $post->save();

        // Xử lý upload tệp và lưu vào thư mục img
        if ($request->hasFile('uploadFiles')) {
            $uploadFiles = $request->file('uploadFiles');
            foreach ($uploadFiles as $file) {
                $mediaType = $file->getMimeType();
                $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('img'), $fileName);

                // Lưu thông tin về tệp vào cơ sở dữ liệu
                $postMedia = new PostMedia();
                $postMedia->media_url = 'img/' . $fileName;
                $postMedia->media_type = $mediaType;
                $postMedia->post_id = $post->id;
                $postMedia->save();
            }
        }

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
        } else {
            return redirect()->route('home')->with('error', 'Bạn không có quyền xoá');
        }
    }
    public function editPost($id)
    {
        $post = DB::table('posts')->select('*')->where('id', $id)->first();
        $postMedias = [];
        if (!is_null($post)) {
            $postMedias = DB::table('post_media')->select('*')->where('post_id', $post->id)->get();
        }
        $protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
        foreach ($postMedias as $pm) {
            $pm->media_url = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . $pm->media_url;
        }
        $post->postMedias = $postMedias;

        //        $posts = DB::table('posts')
        //            ->join('users', 'users.id', '=', 'posts.user_id')
        //            ->join('post_media', 'post_media.post_id', '=', 'posts.id')
        //            ->select('users.name', 'posts.content', 'posts.created_at', 'post_media.media_url', 'post_media.post_id')
        //            ->where('post_id', '=', $id)
        //            ->orderBy('posts.created_at', 'desc')
        //            ->get();

        return view('edit', ['post' => $post]);
    }

    public function updatePost(Request $request, $id)
    {
        $listPostMediaRemoves = $request->input('listPostMediaRemoves');
        $listPostMediaRemoves = rtrim($listPostMediaRemoves, ",");
        if (strlen($listPostMediaRemoves) > 0) {
            $listPostMediaRemoves = explode(",", $listPostMediaRemoves);
            DB::table('post_media')->whereIn('id', $listPostMediaRemoves)->delete();
        }

        $user_id = DB::table('posts')->where('id', $id)->value('user_id');
        if ($user_id == Auth::id()) {
            $post = Post::findOrFail($id);
            $post->content = $request->input('title');
            $post->save();
            $post = $post->fresh();

            if ($request->hasFile('uploadFiles')) {
                $uploadFiles = $request->file('uploadFiles');
                foreach ($uploadFiles as $file) {
                    $mediaType = $file->getMimeType();
                    $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('img'), $fileName);

                    // Lưu thông tin về tệp vào cơ sở dữ liệu
                    $postMedia = new PostMedia();
                    $postMedia->media_url = 'img/' . $fileName;
                    $postMedia->media_type = $mediaType;
                    $postMedia->post_id = $post->id;
                    $postMedia->save();
                }
            }
            return redirect()->route('home');
        } else {
            return redirect()->route('home');
        }
    }

    public function getListImages(Request $request)
    {
        try {
            $postId = $request->post('postId');
            $postMedias = DB::table('post_media')->select('*')->where('post_id', $postId)->get();
            header("Content-Type: application/json");
            echo json_encode($postMedias);
        } catch (\Throwable $th) {
            header("Content-Type: application/json");
            http_response_code(500);
            echo json_encode($th->getMessage());
        }
    }
}
