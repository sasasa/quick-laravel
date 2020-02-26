<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $req)
    {
        $this->validate($req, Comment::$rules);
        $comment = new Comment();
        $comment->post_id = $req->post_id;
        $comment->body = $req->comment_body;
        $comment->save();
    
        $files = $req->file('comment_files');
        if ($files) foreach ($files as $file) {
            $file->store('public');
            $comment->images()->create(['filename' => $file->hashName()]);
        }
        return redirect('posts');
    }
}
