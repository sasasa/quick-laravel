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
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
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
    public function tagNames()
    {
        $ary = $this->tags()->get()->map(function($tag) {
            return '['. $tag->name. ']';
        })->toArray();
        return implode(' ', $ary);
    }
    public function tagsCreate($request)
    {
        \DB::beginTransaction();
        try {
            $this->fill($request->all())->save();
            if(!empty($request->tags)){
                $ids = collect(preg_split("/[\s　]+/u", $request->tags))->map(function ($val) {
                    $tagName = mb_substr($val, 1, -1);
                    if(!empty($tagName)) {
                        $tag = Tag::firstOrCreate(['name' => $tagName]);
                        return $tag->id;
                    }
                });
                if($ids->count() > 0) {
                    $this->tags()->sync($ids);
                }
            } else {
                // 何も送られてこないときは全てのタグを解除する
                $this->tags()->sync([]);
            }
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            throw $e;
        }
    }
}
