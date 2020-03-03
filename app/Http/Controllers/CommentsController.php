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
        $comment->batchSave($req);

        return redirect('posts');
    }

    public function destroy(Comment $comment)
    {
        $comment->batchDelete();
        return redirect('posts');
    } 
}
