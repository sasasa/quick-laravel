<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];
    
    public function skills()
    {
        return $this->morphedByMany('App\Skill', 'taggable');
    }
}
