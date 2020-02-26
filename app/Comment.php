<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public static $rules = [
        'comment_body'    => 'required|string|max:400',
        'comment_files'    => 'required|array',
        'comment_files.*'    => 'image|mimes:jpeg,png,jpg,gif|dimensions:max_width=300',
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'attachable');
    }
}
