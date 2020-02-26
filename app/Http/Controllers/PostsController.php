<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::all()
        ]);
    }

    public function store(Request $req)
    {
        $this->validate($req, Post::$rules);
        $post = new Post();
        $post->fill($req->all())->save();
    
        $files = $req->file('files');
        if ($files) foreach ($files as $file) {
            $file->store('public');
            $post->images()->create(['filename' => $file->hashName()]);
        }
        return redirect('posts');
    }
}
