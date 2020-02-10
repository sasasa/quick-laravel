<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use DB;

class HelloController extends Controller
{
    public function index()
    {
        return 'こんにちは世界！';
    }
    //
    public function view()
    {
        $data = [
            'msg' => 'こんにちは世界！'
        ];
        return view('hello.view', $data);
    }

    public function list()
    {
        // DB::enableQueryLog();
        $data = [
            'records' => Book::has('reviews')->with('reviews')->get(),
            'has_not_records' => Book::doesntHave('reviews')->get(),
        ];
        // dd(DB::getQueryLog());
        sleep(1);
        return view('hello.list', $data);
    }
}
