<?php

namespace App\Http\Controllers;

use App\Book;
use DB;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    //
    public function find()
    {
        return Book::find(1)->title;
    }
    public function all()
    {
        $result = Book::all();
        return view('hello.list', ['records' => $result]);
    }
    public function where()
    {
        // 条件に合致したもの一件のみ
        // $result = Book::where('publisher', '翔泳社')->first();
        // return $result->title;

        // 条件に合致したもの全件
        $result = Book::where('publisher', '翔泳社')->get();
        return view('hello.list', ['records' => $result]);
    }
    public function lessthan()
    {
        $result = Book::where('price', '<', 3000)->get();
        return view('hello.list', ['records' => $result]);
    }
    public function like()
    {
        $result = Book::where('title', 'LIKE', '%Java%')->get();
        return view('hello.list', ['records' => $result]);
    }
    public function whereIn()
    {
        $result = Book::whereIn('publisher', ['日経BP','翔泳社','インプレス'])->get();
        return view('hello.list', ['records' => $result]);
    }
    public function whereBetween()
    {
        $result = Book::whereBetween('price', [1000, 2400])->get();
        return view('hello.list', ['records' => $result]);
    }
    public function whereNull()
    {
        $result = Book::whereNull('publisher')->get();
        return view('hello.list', ['records' => $result]);
    }
    
    // whereDate／ whereYear／ whereMonth/ whereDay/ whereTime などの
    public function whereYear()
    {
        $result = Book::whereYear('published', '<', '2018')->get();
        // $result = Book::whereYear('published', '2018')->get();
        return view('hello.list', ['records' => $result]);
    }
    public function whereMonth()
    {
        $result = Book::whereMonth('published', '<=', '12')
        ->whereYear('published', '<', '2018')->get();
        // $result = Book::whereYear('published', '2018')->get();
        return view('hello.list', ['records' => $result]);
    }




    public function and()
    {
        $result = Book::where('publisher', '翔泳社')->where('price', '<', 3000)->get();
        return view('hello.list', ['records' => $result]);
    }
    public function or()
    {
        $result = Book::where('publisher', '翔泳社')->orWhere('price', '<', 2500)->get();
        return view('hello.list', ['records' => $result]);
    }
    public function raw()
    {
        $result = Book::whereRaw('publisher = ? AND price < ?', ['翔泳社', 3000])->get();
        return view('hello.list', ['records' => $result]);
    }
    public function orderBy()
    {
        $result = Book::orderBy('price', 'desc')->orderBy('published', 'asc')->get();
        return view('hello.list', ['records' => $result]);
    }
    public function offsetlimit()
    {
        // orderByとセットで利用する、2個飛び抜かして3つ取得するので刊行日が3,4,5,番目
        $result = Book::orderBy('published', 'desc')->offset(2)->limit(3)->get();
        // $result = Book::orderBy('published', 'desc')->limit(3)->get();
        return view('hello.list', ['records' => $result]);
    }
    public function select()
    {
        $result = Book::select('title','publisher')->get();
        return view('hello.list', ['records' => $result]);
    }
    public function groupBy()
    {
        $result = Book::groupBy('publisher')->selectRaw('publisher, AVG(price) AS price_avg')->get();
        return view('recoed.groupBy', [
            'records' => $result,
            'title' => "groupBy",
        ]);
    }
    public function having()
    {
        $result = Book::groupBy('publisher')->having('price_avg', '<', 2500)->selectRaw('publisher, AVG(price) AS price_avg')->get();
        return view('record.groupBy', [
            'records' => $result,
            'title' => "having",
        ]);
    }

    // avg／ count／ max／ min
    public function max()
    {
        $result = Book::where('publisher','翔泳社')->max('price');
        return 'publisher: 翔泳社: price max: '. $result;
    }

    // insert／ update／ delete
    public function sql()
    {
        return view('hello.list', [
            'records' => DB::select('SELECT * FROM books'),
        ]);
    }

    public function hasMany()
    {
        return view('record.hasMany', [
            'book' => Book::find(1)
        ]);
    }
}
