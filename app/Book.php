<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['isbn', 'title', 'price', 'publisher', 'published'];

    public static $rules = [
        'isbn'     => 'required',
        'title'    => 'required|string|max:20',
        'price'    => 'integer|min:0|hello',
        'publisher'=> 'required|in:翔泳社,技術評論社,日経BP,秀和システム,インプレス',
        'published'=> 'required|date',
        'consent'  => 'accepted',
        'password' => 'required|confirmed',
    ];
    
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
    public function reviewComments()
    {
        return $this->hasManyThrough('App\ReviewComment', 'App\Review');
    }

    public function scopeAgeGreaterThan($q, $n)
    {
        return $q->where('price', '>=', $n);
    }

    public function scopeAgeLessThan($q, $n)
    {
        return $q->where('price', '<=', $n);
    }
}
