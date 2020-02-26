<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['subject', 'body'];
    
    public static $rules = [
        'subject'    => 'required|string|max:20',
        'body'    => 'required|string|max:400',
        'files'    => 'required|array',
        'files.*'    => 'image|mimes:jpeg,png,jpg,gif|dimensions:max_width=600',
    ];
    
    public function images()
    {
        return $this->morphMany(Image::class, 'attachable');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
