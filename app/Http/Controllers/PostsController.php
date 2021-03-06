<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostCreateRequest;

class PostsController extends Controller
{
    public function destroy(Post $post)
    {
        $post->batchDelete();
        return redirect('posts');
    } 
    
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::all()
        ]);
    }

    public function store(PostCreateRequest $req)
    {
        // $this->validate($req, Post::$rules);
        $post = new Post();
        $post->batchSave($req);

        return redirect('posts');
    }
}
