<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewComment extends Model
{
    protected $fillable = ['review_id', 'body',];
    
    public static $rules = [
        'body'    => 'required|string|max:400',
        'review_id'    => 'required|integer',
    ];

    public function review()
    {
        return $this->belongsTo('App\Review');
    }
}
