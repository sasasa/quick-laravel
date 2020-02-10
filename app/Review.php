<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Review extends Model
{
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
    public function getData()
    {
        if($this->deleted) {
            return "";
        }
        return $this->body. "\n(". $this->name . ")";
    }
}
