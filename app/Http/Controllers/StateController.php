<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StateController extends Controller
{
    //
    public function recCookie()
    {
        return response()
        ->view('state.readcookie', [
            'title'=>''
        ])
        ->cookie('app_title', 'Laravel速習', 60*24*30);
    }

    public function readCookie(Request $req)
    {
        return response()
        ->view('state.readcookie', [
            'title'=>$req->cookie('app_title')
        ]);
    }

    public function session1(Request $req)
    {
        $req->session()->put('series', '速習シリーズ');
        return "セッションを保存しました。";
    }
    public function session2(Request $req)
    {
        $series = $req->session()->get('series', '----');
        return "セッション：シリーズ：". $series;
    }
    public function session3(Request $req)
    {
        // 別パターンの書き方
        session(['series'=>'超絶速習シリーズ']);
        return "セッションを保存しました。";
    }
    public function session4(Request $req)
    {
        // 別パターンの書き方
        $series = session('series', '-----');
        return "セッション：シリーズ：". $series;
    }
}
