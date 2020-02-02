<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CtrlController extends Controller
{
    //
    public function plain()
    {
        return response('こんにちは世界！', 200)->header('Content-Type', 'text/plain');
    }
    public function header()
    {
        return response()
            ->view('ctrl.header', ['msg'=>'こんにちは世界!'], 200)
            // ->header('Content-Type', 'text/xml');
            ->withHeaders([
                'Content-Type'=>'text/xml',
                'X-Powered-FW'=>'Laravel/6',
            ]);
    }
    public function outJson()
    {
        return response()
        ->json([
                'name'=>'Yoshihiro, Yamada',
                'sex'=>'mail',
                'age'=>18,
        ])
        ->withCallback('callbackmethod');
    }
    public function outJson2()
    {
        return [
            'name'=>'Yoshihiro, Yamada',
            'sex'=>'mail',
            'age'=>18,
        ];
    }
}
