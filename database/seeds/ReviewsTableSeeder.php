<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('INSERT INTO reviews (book_id, name, body)VALUES(1, "山田太郎", "環境を作るのに手間取ったが、本の通りにゲームアプリを作ることができて、楽しかった。")');
        
        DB::insert('INSERT INTO reviews (book_id, name, body)VALUES(1, "鈴木智子", "初めてC#に挑戦しました。手順説明が丁寧で、図が多くて、良かったです。")');

        DB::insert('INSERT INTO reviews (book_id, name, body)VALUES(1, "田中博司", "小5の子どもと一緒に勉強しました。途中からほとんど私がコーディングしていましたが。。。ダウンロードサンプルがあったので、つまづいた時に利用できて助かりました。")');
        
        DB::insert('INSERT INTO reviews (book_id, name, body)VALUES(2, "山田太郎", "仕事でAndroidアプリ開発を行うことになって購入した。説明が詳しく、分かりやすい。")');
        $param = [
            'book_id' => 2,
            'name' => '名前2-2',
            'body' => 'レヴュー内容２-2',
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'book_id' => 3,
            'name' => '名前3-1',
            'body' => 'レヴュー内容3-1',
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'book_id' => 3,
            'name' => '名前3-2',
            'body' => 'レヴュー内容3-2',
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'book_id' => 4,
            'name' => '名前4-1',
            'body' => 'レヴュー内容4-1',
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'book_id' => 4,
            'name' => '名前4-2',
            'body' => 'レヴュー内容4-2',
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'book_id' => 5,
            'name' => '名前5-1',
            'body' => 'レヴュー内容5-1',
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'book_id' => 5,
            'name' => '名前5-2',
            'body' => 'レヴュー内容5-2',
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'book_id' => 6,
            'name' => '名前6-1',
            'body' => 'レヴュー内容6-1',
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'book_id' => 7,
            'name' => '名前7-1',
            'body' => 'レヴュー内容7-1',
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'book_id' => 8,
            'name' => '名前8-1',
            'body' => 'レヴュー内容8-1',
        ];
        DB::table('reviews')->insert($param);
    }
}
