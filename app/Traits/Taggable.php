<?php namespace App\Traits;
use App\Tag;

trait Taggable
{
  public function tags()
  {
      return $this->morphToMany('App\Tag', 'taggable');
  }

  public function tagNames()
  {
      $ary = $this->tags()->get()->map(function($tag) {
          return '['. $tag->name. ']';
      })->toArray();
      return implode(' ', $ary);
  }

  public function deleteWithTags()
  {
      \DB::beginTransaction();
      try {
          $this->tags()->sync([]);
          $this->delete();
          \DB::commit();
      } catch (\Exception $e) {
          \DB::rollback();
          throw $e;
      }
  }

  public function tagsCreate($request)
  {
      \DB::beginTransaction();
      try {
          $this->fill($request->all())->save();
          if(!empty($request->tags)){
              $ids = collect(preg_split("/[\s　]+/u", $request->tags))->map(function($val) {
                  $tagName = mb_substr($val, 1, -1);
                  if(!empty($tagName)) {
                      $tag = Tag::firstOrCreate(['name' => $tagName]);
                      return $tag->id;
                  }
              })->reject(function($val) {
                return is_null($val);
              });
              if($ids->unique()->count() > 0) {
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