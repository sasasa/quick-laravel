<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Book;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $sort = $request->sort;
        if(empty($sort)) {
            $sort = 'book_id';
        }
        return view('reviews.index', [
            'reviews' => Review::orderBy($sort, 'asc')->paginate(3),
            'sort' => $sort,
            'user' => $user,
        ]);
    }

    public function create()
    {
        return view('reviews.create', [
            'books' => Book::all(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, Review::$rules);
        $review = new Review;
        $form = $request->all();
        $review->fill($form)->save();
        return redirect('/reviews')
        ->with('store', "レビューID：". $review->id. 'を作成しました。');
    }

    public function show(Review $review)
    {
        return view('reviews.show', [
            // 'form' => Review::findorfail($id),
            'form' => $review,
        ]);
    }

    public function edit(Review $review)
    {
        return view('reviews.edit', [
            // 'form' => Review::findorfail($id),
            'form' => $review,
            'books' => Book::all()
        ]);
    }

    public function update(Request $request, Review $review)
    {
        $this->validate($request, Review::$rules);
        // $review = Review::findorfail($id);
        $form = $request->all();
        $review->fill($form)->save();
        return redirect('/reviews')
        ->with('update', "レビューID：". $review->id. 'を更新しました。');
    }

    public function destroy(Review $review)
    {
        // $review = Review::findorfail($id);
        $review->delete();
        return redirect('/reviews')
        ->with('delete', "レビューID：". $review->id. 'を削除しました。');
    }
}
