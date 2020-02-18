<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function users()
    {
        return $this
        ->belongsToMany('App\User', 'skill_user')
        ->using(SkillUser::class)->withPivot(['proficiency']);
    }
}
