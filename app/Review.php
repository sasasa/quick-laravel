<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Review extends Model
{
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
    public function getData()
    {
        if($this->deleted) {
            return "";
        }
        return $this->body. "\n(". $this->name . ")";
    }
}
