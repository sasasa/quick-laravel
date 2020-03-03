<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Scout\Searchable;


class Review extends Model
{
    use Searchable;
    
    public static $rules = [
        'name'    => 'required|string|max:10',
        'body'    => 'required|string|max:400',
        'book_id'    => 'required|integer',
    ];
    
    protected $fillable = ['book_id', 'name', 'body'];

    // グローバルスコープは関連にも影響するので使いにくいためコメント
    // protected static function boot()
    // {
    //     parent::boot();
    //     static::addGlobalScope('deleted', function (Builder $builder){
    //         $builder->where('deleted', true);
    //     });
    // }

    public function book()
    {
        return $this->belongsTo('App\Book');
    }
    public function reviewComments()
    {
        return $this->hasMany('App\ReviewComment');
    }

    // アクセサ ->BodyAndName、->body_and_name などでアクセス可能になる
    public function getBodyAndNameAttribute()
    {
        if($this->deleted) {
            return "";
        }
        return $this->body. "\n(". $this->name . ")";
    }
    // 全文検索インデックス
    public function searchableAs()
    {
        return 'reviews_index';
    }
    // 全文検索に関連のカラム名も含める
    public function toSearchableArray()
    {
        $array = $this->toArray();
        // $array = $this->transform($array);
        $array['book_title'] = $this->book->title;

        return $array;
    }
}
