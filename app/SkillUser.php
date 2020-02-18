<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class SkillUser extends Pivot
{
    protected $table = 'skill_user';
    
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    // public function skill()
    // {
    //     return $this->belongsTo(Skill::class);
    // }
}
