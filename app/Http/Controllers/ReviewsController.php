<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Book;
use App\Jobs\MyJob;
use Illuminate\Support\Facades\Auth;
use DB;
class ReviewsController extends Controller
{
    public function index(Request $request)
    {
        // Review::get(['*'])->searchable();
        $user = Auth::user();
        MyJob::dispatch($user)->delay(now()->addMinutes(1));
        $sort = $request->sort;
        $next = $request->next;
        $search = $request->search;
        if (empty($sort)) {
            $sort = 'book_id';
        }
        if (empty($next)) {
            $next = 'desc';
            $actual = 'asc';
        } else if ($next == 'asc') {
            $next = 'desc';
            $actual = 'asc';
        } else if ($next == 'desc') {
            $next = 'asc';
            $actual = 'desc';
        }
        if (!empty($request->actual)) {
            $actual = $request->actual;
        }

        if (empty($search)) {
            $reviews = Review::with('book')->orderBy($sort, $actual)->paginate(3);
        } else {
            // algolia OR tnt
            $reviews = Review::search($search)->orderBy($sort, $actual)->paginate(3);
        }
        return view('reviews.index', [
            'reviews' => $reviews,
            'sort' => $sort,
            'user' => $user,
            'search' => $search,
            'next' => $next,
            'actual' => $actual,
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
