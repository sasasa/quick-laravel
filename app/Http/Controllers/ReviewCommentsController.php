<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReviewComment;

class ReviewCommentsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, ReviewComment::$rules);
        $reviewComment = new ReviewComment;
        $form = $request->all();
        $reviewComment->fill($form)->save();
        return redirect('/reviews')
        ->with('store', "レビューへのコメントID：". $reviewComment->id. 'を作成しました。');
    }

    public function destroy(ReviewComment $reviewComment)
    {
        $reviewComment->delete();
        return redirect('/reviews')
        ->with('delete', "レビューへのコメントID：". $reviewComment->id. 'を削除しました。');
    }
}
