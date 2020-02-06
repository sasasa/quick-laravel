<?php
use App\Http\Middleware\LogMiddleware;
use App\Http\Middleware\UpperMiddleware;
use App\Http\Middleware\ElapsedTimeMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('hello','HelloController@index');
Route::get('hello/view','HelloController@view');
Route::get('hello/list','HelloController@list')->middleware(ElapsedTimeMiddleware::class);;

Route::get('view/escape','ViewController@escape');
Route::get('view/if','ViewController@if');
Route::get('view/isset','ViewController@isset');
Route::get('view/switch','ViewController@switch');
Route::get('view/while','ViewController@while');
Route::get('view/for','ViewController@for');
Route::get('view/foreach_assoc','ViewController@foreach_assoc');
Route::get('view/foreach_loop','ViewController@foreach_loop');
Route::get('view/forelse','ViewController@forelse');
Route::get('view/master','ViewController@master');
Route::get('view/comp','ViewController@comp');

Route::get('route/param/{id?}','RouteController@param')->where(['id'=>'[0-9]{2,3}'])->name('param');

Route::get('route/search/{keywd?}', 'RouteController@search')->where(['keywd'=>'.*']);

Route::prefix('members')->group(function(){
    Route::get('info', 'RouteController@info');
    Route::get('article', 'RouteController@article');
});

Route::namespace('Main')->group(function(){
    Route::get('route/ns', 'RouteController@namespace');
});

Route::view('route', 'route.view', [
    'name'=>'Laravel',
    'app'=>'Rails',
]);

// default 302 Found
Route::redirect('/hoge', '/', 301);

Route::resource('articles', 'ArticleController');


Route::get('ctrl/plain/{id}','CtrlController@plain');
Route::get('ctrl/header','CtrlController@header');
Route::get('ctrl/outJson','CtrlController@outJson');
Route::get('ctrl/outJson2','CtrlController@outJson2');
Route::get('ctrl/outFile','CtrlController@outFile');
Route::get('ctrl/outCSV','CtrlController@outCSV');
Route::get('ctrl/outImage','CtrlController@outImage');
Route::get('ctrl/redirectBasic','CtrlController@redirectBasic');
Route::get('ctrl/redirectNameParam','CtrlController@redirectNameParam');
Route::get('ctrl/redirectAction','CtrlController@redirectAction');
Route::get('ctrl/redirectAway','CtrlController@redirectAway');
Route::get('ctrl/index','CtrlController@index');
Route::get('ctrl/form','CtrlController@form');
Route::post('ctrl/result','CtrlController@result');
Route::get('ctrl/upload','CtrlController@upload');
Route::post('ctrl/upload','CtrlController@uploadfile');
Route::get('ctrl/uploadimage/{name}','CtrlController@uploadimage');
Route::get('ctrl/middle','CtrlController@middle')->middleware(LogMiddleware::class);
Route::group(['middleware'=>['debug']], function(){
    Route::get('ctrl/upper','CtrlController@upper')->middleware(UpperMiddleware::class);
});

Route::get('state/recCookie','StateController@recCookie');
Route::get('state/readCookie','StateController@readCookie');
Route::get('state/session1','StateController@session1');
Route::get('state/session2','StateController@session2');
Route::get('state/session3','StateController@session3');
Route::get('state/session4','StateController@session4');

Route::get('record/find','RecordController@find');
Route::get('record/all','RecordController@all');
Route::get('record/where','RecordController@where');
Route::get('record/lessthan','RecordController@lessthan');
Route::get('record/like','RecordController@like');
Route::get('record/whereIn','RecordController@whereIn');
Route::get('record/whereBetween','RecordController@whereBetween');
Route::get('record/whereNull','RecordController@whereNull');
Route::get('record/whereYear','RecordController@whereYear');
Route::get('record/and','RecordController@and');
Route::get('record/or','RecordController@or');
Route::get('record/raw','RecordController@raw');
Route::get('record/orderBy','RecordController@orderBy');
Route::get('record/offsetlimit','RecordController@offsetlimit');
Route::get('record/select','RecordController@select');
Route::get('record/groupBy','RecordController@groupBy');
Route::get('record/having','RecordController@having');
Route::get('record/max','RecordController@max');
Route::get('record/sql','RecordController@sql');
Route::get('record/hasMany','RecordController@hasMany');


Route::get('save/create','SaveController@create');
Route::post('save/store','SaveController@store');
Route::get('save/{id}/edit','SaveController@edit');
Route::patch('save/{id}','SaveController@update');
Route::get('save/{id}','SaveController@show');
Route::delete('save/{id}','SaveController@destroy');
// Route::resource('save', 'SaveController');



Route::fallback(function(){
    return view('route.error');
});