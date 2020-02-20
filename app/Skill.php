<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class SkillCollection extends Collection
{
    public function skillsGroupByTypeForSelect()
    {
        $ret = [];
        $this->each(function($skill) use(&$ret) {
            $ret[$skill->type][$skill->id] = $skill->name;
        });
        return $ret;
    }
}

class Skill extends Model
{
    public static $rules = [
        'name'    => 'required|string|unique:skills|max:10',
        'type'    => 'required|integer|in:1,2',
    ];

    protected $fillable = ['type', 'name'];
    
    const TYPES = ['オフィス', 'プログラム','デザイン'];

    public function newCollection(array $models = [])
    {
        return new SkillCollection($models);
    }

    public function users()
    {
        return $this
        ->belongsToMany('App\User', 'skill_user')
        ->using(SkillUser::class)->withPivot(['proficiency']);
    }

    // アクセサ ->type でアクセスするとこの値になる
    public function getTypeAttribute($value)
    {
        return self::TYPES[$value];
    }
}
