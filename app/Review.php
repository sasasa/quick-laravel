<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function book()
    {
        return $this->belongsTo('App\Book');
    }
    public function getData()
    {
        return $this->body. "\n(". $this->name . ")";
    }
}
