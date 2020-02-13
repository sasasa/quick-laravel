<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CtrlController extends Controller
{
    //
    public function plain(Request $req, int $id)
    {
        return response($req->path(). "こんにちは世界！". $id, 200)
        ->header('Content-Type', 'text/plain');
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
    public function outFile()
    {
        return response()->
        download('C:\Users\user07\php\quick-laravel\books.csv', 'download.csv', [
            'content-type'=>'text/csv'
        ]);
    }
    public function outCSV()
    {
        return response()->
        streamDownload(function(){
            print(
                "1,2019/10/1,123\n".
                "2,2019/10/2,116\n".
                "3,2019/10/3,98\n".
                "4,2019/10/4,102\n".
                "5,2019/10/5,134\n".
                "6,2019/10/6,120\n"
            );
        }, 'download2.csv', [
            'content-type'=>'text/csv'
        ]);
    }
    public function outImage()
    {
        return response()->
        file('C:\Users\user07\php\quick-laravel\laravel.png', [
            'content-type'=>'image/png'
        ]);
    }
    public function redirectBasic()
    {
        return redirect('hello/list');
    }
    public function redirectNameParam()
    {
        return redirect()->route('param',[
            'id' => 108
        ]);
    }
    public function redirectAction()
    {
        return redirect()->action('RouteController@param', [
            'id'=>111
        ]);
    }
    public function redirectAway()
    {
        return redirect()->away('https://wings.msn.to/index.php/-/A-03/WGS-PHP-001/');
    }
    public function index(Request $req)
    {
        var_dump([
            'リクエストパス: ' => $req->path(),
            'ヘッダーUser-Agent： ' => $req->header('User-Agent'),
            'ヘッダーhas User-Agent： ' => $req->hasHeader('User-Agent'),
            'サーバー：SERVER_PROTOCOL ' => $req->server('SERVER_PROTOCOL'),
            'ルート： ' => $req->root(),
            'リクエストURL：param無し ' => $req->url(),
            'リクエストURL：paramあり ' => $req->fullUrl(),
            'is:/ctrl/index/ ' => $req->is('/ctrl/index/'),
            'ip: ' => $req->ip(),
            'userAgent: ' => $req->userAgent(),
        ]);
        
        return "<p>middleware hoge: ". $req->hoge. "</p>";
    }
    public function form(Request $req)
    {
        // nameがそもそもないときはデフォルトが呼ばれる
        $name = $req->input('name', '名無しの権平');
        return view('ctrl.form', ['result'=>$name]);
    }
    public function result(Request $req)
    {
        // $name = $req->name;
        // nameが空文字の時はデフォルトは呼ばれない
        $name = $req->input('name', '名無しの権平');

        if(empty($name) || mb_strlen($name) > 10 ) {
            return redirect('ctrl/form')
            // 入力欄の復元
            ->withInput()
            // flashメッセージ
            ->with('alert', '名前は必須または10文字以内で入力してください。');
        } else {
            // リクエスト情報をflashに保存する
            $req->flash();
            return view('ctrl.form', [
                'result'=>'こんにちは'. $name. 'さん！'
            ]);
        }
    }
    public function upload()
    {
        return view('ctrl.upload', ['result'=>'']);
    }
    public function uploadimage(string $name)
    {
        if(strpos($name, '..') !== false){
            return "";
        }
        $fullPath = storage_path('app'. DIRECTORY_SEPARATOR. 'public'. DIRECTORY_SEPARATOR. $name);
        $mimeType = mime_content_type($fullPath);

        return response()->file($fullPath, [
            'Content-type' => $mimeType,
        ]);
    }
    public function imagedownload(string $name) {
        if(strpos($name, '..') !== false){
            return "";
        }
        return Storage::disk('public')->download($name);
    }
    public function uploadfile(Request $req)
    {
        // ファイルが指定されているか
        if(!$req->hasFile('upfile')) {

            return redirect('ctrl/upload')->with('error', 'ファイルを指定してください。');
        }
        $file = $req->upfile;
        // 正しくアップロードできているか
        if(!$file->isValid()) {
            return redirect('ctrl/upload')->with('error', 'アップロードに失敗しました。');
        }
        $this->validate($req, [
            'upfile' => 'image|dimensions:max_width=600',
        ]);


        // オリジナルファイル名を取得
        $name = $file->getClientOriginalName();
        $mimeType = $file->getClientMimeType();

        // アップロードファイルを保存
        $file->storeAs('public', $name);
        $url = Storage::disk('public')->url($name);
        $path = storage_path('app'.DIRECTORY_SEPARATOR. 'public'. DIRECTORY_SEPARATOR. $name);

        return view('ctrl.upload', [
            'result' => $name. 'をアップロードしました。'.$url . ": ". $mimeType,
            'path' => $path,
            'name' => $name,
        ]);
    }
    public function middle(Request $req)
    {
        return view('ctrl.middle', [
            'title'=>$req->title,
            'author'=>$req->author,
        ]);
    }
    public function upper(Request $req)
    {
        return "aiueo upper?";
    }

    // コンストラクタ
    public function __construct()
    {
        $this->middleware(function($req, $next) {
            // ビュー変数を設定
            $req->merge([
                'hoge'=>"速習Laravel",
            ]);
            return $next($req);
        })->only(['index']);
    }
}
