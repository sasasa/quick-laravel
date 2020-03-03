<?php

use Illuminate\Database\Seeder;
use App\ReviewComment;

class ReviewCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReviewComment::truncate();
        $param = [
            'review_id' => 1,
            'body' => 'レビューコメント１－１',
        ];
        DB::table('review_comments')->insert($param);
        $param = [
            'review_id' => 1,
            'body' => 'レビューコメント１－２',
        ];
        DB::table('review_comments')->insert($param);
        $param = [
            'review_id' => 1,
            'body' => 'レビューコメント１－３',
        ];
        DB::table('review_comments')->insert($param);
        $param = [
            'review_id' => 2,
            'body' => 'レビューコメント2－１',
        ];
        DB::table('review_comments')->insert($param);
        $param = [
            'review_id' => 2,
            'body' => 'レビューコメント2－2',
        ];
        DB::table('review_comments')->insert($param);
        $param = [
            'review_id' => 3,
            'body' => 'レビューコメント3－１',
        ];
        DB::table('review_comments')->insert($param);
        $param = [
            'review_id' => 3,
            'body' => 'レビューコメント3－2',
        ];
        DB::table('review_comments')->insert($param);
        $param = [
            'review_id' => 4,
            'body' => 'レビューコメント4－１',
        ];
        DB::table('review_comments')->insert($param);
        $param = [
            'review_id' => 4,
            'body' => 'レビューコメント4－2',
        ];
        DB::table('review_comments')->insert($param);
        $param = [
            'review_id' => 5,
            'body' => 'レビューコメント5－１',
        ];
        DB::table('review_comments')->insert($param);
        $param = [
            'review_id' => 5,
            'body' => 'レビューコメント5－2',
        ];
        DB::table('review_comments')->insert($param);
        $param = [
            'review_id' => 6,
            'body' => 'レビューコメント6－１',
        ];
        DB::table('review_comments')->insert($param);
        $param = [
            'review_id' => 6,
            'body' => 'レビューコメント6－2',
        ];
        DB::table('review_comments')->insert($param);
        $param = [
            'review_id' => 7,
            'body' => 'レビューコメント7－１',
        ];
        DB::table('review_comments')->insert($param);
        $param = [
            'review_id' => 7,
            'body' => 'レビューコメント7－2',
        ];
        DB::table('review_comments')->insert($param);
        $param = [
            'review_id' => 8,
            'body' => 'レビューコメント8－１',
        ];
        DB::table('review_comments')->insert($param);
        $param = [
            'review_id' => 9,
            'body' => 'レビューコメント9－１',
        ];
        DB::table('review_comments')->insert($param);
        $param = [
            'review_id' => 10,
            'body' => 'レビューコメント１0－１',
        ];
        DB::table('review_comments')->insert($param);
        $param = [
            'review_id' => 10,
            'body' => 'レビューコメント１0－2',
        ];
        DB::table('review_comments')->insert($param);
        $param = [
            'review_id' => 10,
            'body' => 'レビューコメント１0－3',
        ];
        DB::table('review_comments')->insert($param);
        $param = [
            'review_id' => 10,
            'body' => 'レビューコメント１0－4',
        ];
        DB::table('review_comments')->insert($param);
    }
}
