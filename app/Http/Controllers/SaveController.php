<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use Illuminate\Validation\Rule;

class SaveController extends Controller
{
    public function create()
    {
        return view('save.create');
    }
    
    public function store(StoreRequest $req)
    {
        // $this->validate($req, Book::$rules);
        
        $b = new Book();
        $b->fill($req->except('_token'))->save();
        return redirect('save/create');
    }

    public function edit(Request $req, int $id)
    {
        return view('save.edit', [
            'b' => Book::findOrFail($id)
        ]);
    }

    public function update(UpdateRequest $req, int $id)
    {
        // $this->validate($req, Book::$rules);
        $b = Book::find($id);

        $req->validate([
            'isbn' => [Rule::unique('books', 'isbn')->whereNot('isbn', $b->isbn)]
        ]);

        $b->fill($req->except('_token','_method'))->save();
        return redirect('hello/list');
    }

    public function show(int $id)
    {
        return view('save.show', [
            'b'=>Book::findOrFail($id)
        ]);
    }

    public function destroy(int $id)
    {
        $b = Book::findOrFail($id);
        $b->delete();
        return redirect('hello/list');
        
    }
}
