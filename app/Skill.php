<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Traits\Taggable;

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
    use Taggable;
    
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

    // アクセサ ->type でアクセスすると本来の値ではなくこの値になる
    public function getTypeAttribute($value)
    {
        return self::TYPES[$value];
    }
    // アクセサ ->rypeRaw　で本来のカラムの値を取得可能
    public function getTypeRawAttribute()
    {
        return $this->attributes['type'];
    }

}
