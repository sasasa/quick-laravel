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
    }
}
