<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function escape()
    {
        return view('view.escape', [
            'msg' => '<img src="https://wings.msn.to/image/wings.jpg" title ="ロゴ"/><p>WINGSへようこそ</p>'
        ]);
    }
    public function if()
    {
        return view('view.if', [
            'random' => random_int(0, 100)
        ]);
    }
    public function isset()
    {
        return view('view.isset', [
            'msg' => "こんにちは世界!"
        ]);
    }
    public function switch()
    {
        return view('view.switch', [
            'random' => random_int(1, 5)
        ]);
    }
    public function while()
    {
        return view('view.while', []);
    }
    public function for()
    {
        return view('view.for', []);
    }
}
